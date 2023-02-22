﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Google.Protobuf.WellKnownTypes;
using MySql.Data.MySqlClient;


namespace Fogadas_zaro
{
    class Program
    { 
       
        static int sorsolas(double hazairange, double vendegrange,Random rng)
        {

            double random = Convert.ToDouble(rng.Next(-1000, 1001)) / 1000;
            int fix = rng.Next(1, 5);
            if (random > hazairange)
            {
                double szorzo = ((random - hazairange) / (1 - hazairange));
                double hazaipont = Math.Round(fix + szorzo * fix);
                double vendegpont = Math.Floor(fix - szorzo * fix); 
                int golszam = Convert.ToInt32(hazaipont + vendegpont);
                Console.WriteLine($"{golszam} gól volt a meccsen");
                Console.WriteLine($"{hazaipont}-{vendegpont}");
                Console.WriteLine("Hazai nyert");
                return 0;
            }
            else if (random < vendegrange)
            {
                double szorzo = ((random - vendegrange) / (-1 - vendegrange));
                double vendegpont = Math.Round(fix + szorzo * fix);
                double hazaipont = Math.Floor(fix - szorzo * fix);
                int golszam = Convert.ToInt32(hazaipont + vendegpont);
                Console.WriteLine($"{golszam} gól volt a meccsen");
                Console.WriteLine($"{hazaipont}-{vendegpont}");
                Console.WriteLine("Vendég nyert");
                return 1;
            }
            else
            {
                int golszam = fix * 2;
                Console.WriteLine($"{golszam} gól volt a meccsen");
                Console.WriteLine($"{fix}-{fix}");
                Console.WriteLine("Döntetlen");
                return 2;
            }
            
        }
        static void Main(string[] args)
        {
            Random rng = new Random(Guid.NewGuid().GetHashCode());
            Database database = new Database();
            int[] csapatok = database.csapatsorsolas(rng);
            string[] csapatnev = database.csapatnev(csapatok);
            int hazainyer = database.getcsapatnyer(csapatok[0]);
            int vendegnyer = database.getcsapatnyer(csapatok[1]);
            double suly = Convert.ToDouble(vendegnyer - hazainyer) / 10;
            double hazaisuly = 0;
            if (Math.Abs(hazaisuly) == hazaisuly)
            {
                hazaisuly = suly * 1.5;
            }
            else
            {
                hazaisuly = suly;
            }
            double vendegsuly = 0;
            if (Math.Abs(vendegsuly) != vendegsuly)
            {
                vendegsuly = suly * 1.5;
            }
            else
            {
                vendegsuly = suly;
            }
            double hazairange = 0.3 + hazaisuly;
            double vendegrange = -0.3 + vendegsuly;
            Console.WriteLine($"{csapatok[0]} {csapatok[1]}");
            Console.WriteLine($"{csapatnev[0]} {csapatnev[1]}");
            
            int eredmeny = sorsolas(hazairange,vendegrange,rng);
            if (eredmeny != 2)
            {
            string[] temp2 = database.gol_lovo(rng,csapatok[eredmeny]);
            Console.WriteLine($"{temp2[0]}---{temp2[1]}");
            }
            Console.ReadKey();

        }
      
    }
}
