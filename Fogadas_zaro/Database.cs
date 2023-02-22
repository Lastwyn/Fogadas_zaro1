﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using System.Data.SqlClient;


namespace Fogadas_zaro
{
    class Database
    {
        static public MySqlCommand command;
        static public MySqlConnection connection;

        public Database(string server = "localhost", string user = "root", string password = "", string db = "fogadas_zaro")
        {
            MySqlConnectionStringBuilder builder = new MySqlConnectionStringBuilder();
            builder.Server = server;
            builder.UserID = user;
            builder.Password = password;
            builder.Database = db;
            connection = new MySqlConnection(builder.ConnectionString);
            if (Kapcsolatok())
            {
                command = connection.CreateCommand();
            }
        }
        private bool Kapcsolatok()
        {
            try
            {
                connection.Open();
                connection.Close();
                return true;
            }
            catch (MySqlException ex)
            {
                Console.WriteLine(ex.Message);
                return false;
            }
        }
        public int getcsapatnyer(int csapat_id)
        {
            int temp = 0;
            command.Parameters.Clear();
            command.CommandText = "SELECT * FROM `meccs_eredmeny` WHERE `hazai_id` = @id OR `vendeg_id` = @id ORDER BY meccs_id DESC LIMIT 5;";
            command.Parameters.AddWithValue("@id", csapat_id);
            connection.Open();
            using (MySqlDataReader dr = command.ExecuteReader())
            {
                while (dr.Read())
                {
                    int hazai = dr.GetInt32("hazai_id");
                    int vendeg = dr.GetInt32("vendeg_id");
                    int[] eredmeny = Array.ConvertAll(dr.GetString("eredmeny").Split('-'), int.Parse);
                    if (hazai == csapat_id)
                    {
                        if (eredmeny[0] > eredmeny[1])
                        {
                            temp++;
                        }
                    }
                    else if (vendeg == csapat_id)
                    {
                        if (eredmeny[0] < eredmeny[1])
                        {
                            temp++;
                        }
                    }
                }
            }
            connection.Close();
            return temp;
        }
        public string[] csapatnev(int[] csapat)
        {
            string[] csapatnev = new string[2];
            for (int i = 0; i < 2; i++)
            {
                command.Parameters.Clear();
                command.CommandText = "SELECT nemzet_nev FROM `nemzetek`WHERE nemzet_id = @id ";
                command.Parameters.AddWithValue("@id", csapat[i]);
                connection.Open();
                using (MySqlDataReader dr = command.ExecuteReader())
                {
                    dr.Read();
                    string csapatneve = dr.GetString("nemzet_nev");
                    csapatnev[i] = csapatneve;
                }
                connection.Close();
            }            
            return csapatnev;
        }
        public int[] csapatsorsolas(Random rng)
        {   
            int[] adatvissza = new int[2];
            command.Parameters.Clear();
            command.CommandText = "SELECT COUNT(`nemzet_id`) AS 'idcount'FROM `nemzetek`";
            connection.Open();

            using (MySqlDataReader dr = command.ExecuteReader())
            {
                dr.Read();
                int temp = dr.GetInt32("idcount")+1;
                adatvissza[0] = rng.Next(1, temp);
                bool a = true;
                while (a)
                {
                    adatvissza[1] = rng.Next(1, temp);
                    if (adatvissza[0] != adatvissza[1])
                    {
                        a = false;
                    }
                }
                
            }
            connection.Close();
            return  adatvissza;
        }

        public string[] gol_lovo(Random rng,int csapatid)
        {
            command.Parameters.Clear();        
            command.CommandText = "SELECT * FROM jatekosok WHERE nemzet_id = @id";
            command.Parameters.AddWithValue("@id", csapatid);
            connection.Open();

            var jatekosok = new List<Jatekos>();
            using (MySqlDataReader dr = command.ExecuteReader()) 
            {
                while (dr.Read())
                {
                    int nemzet_id = dr.GetInt32("nemzet_id");
                    string nev = dr.GetString("jatekos_nev");
                    string pozicio = dr.GetString("pozicio");
                    jatekosok.Add(new Jatekos(nemzet_id, nev, pozicio));
                }
            } 
            
            //próba sorsolás gól 
            string[] temp = new string[2];
            Jatekos goljelolt = null;
            while (goljelolt == null)
            {
                int valasztottJatekosIndex = rng.Next(jatekosok.Count);
                Jatekos valasztottJatekos = jatekosok[valasztottJatekosIndex];
               
                switch (valasztottJatekos.Pozicio)
                {
                    case "Kapus":
                        break;
                    case "Védő":
                        if (rng.Next(5) == 0)
                        {
                            goljelolt = valasztottJatekos;
                            temp[0] = goljelolt.Jatekos_nev;
                            temp[1] = "Védő";
                        }
                        break;
                    case "Középpályás":
                        if (rng.Next(4) == 0)
                        {
                            goljelolt = valasztottJatekos;
                            temp[0] = goljelolt.Jatekos_nev;
                            temp[1] = "Középpályás";
                        }
                        break;
                    case "Csatár":
                        if (rng.Next(4) == 0)
                        {
                            goljelolt = valasztottJatekos;
                            temp[0] = goljelolt.Jatekos_nev;
                            temp[1] = "Csatár";
                        }
                        break;
                 

                }
            }
            connection.Close(); 
            return temp;
            
        }
    }
}
