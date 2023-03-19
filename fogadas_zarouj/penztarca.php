<?php include('header.php'); ?>

<main>
    <div class="kozos1">
        <div class="kozep">
            <div class="grid-container-adat">
                <div class="col1-adat">
                    <h2>Felhasználó neve:</h2>
                    <?php if (isset($_SESSION['felhasz_nev'])) : ?>
                        <h3><?= $_SESSION['felhasz_nev']; ?></h3>
                    <?php endif; ?>
                </div>
                <div class="col2-adat">
                    <h2>Egyenlege:</h2>
                    <?php if (isset($_SESSION['egyenleg'])) : ?>
                        <h3><?= $_SESSION['egyenleg']; ?> Ft</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="pf">
        <h1>Pénzfeltöltés:</h1>
    </div>
    <div class="pk">
        <h1>Pénzkifizetés:</h1>
    </div>
    <div class="kozos">
        <div class="penzfeltoltes">
            <div class="grid-container-penzfeltoltes">

                <div class="col1-penzfeltoltes">
                    <label for="kartyaszam">Adja meg a kártyaszámot:</label>
                    <input type="text" name="kartyaszam" id="kartyaszam">
                </div>
                <div class="col2-penzfeltoltes">
                    <label for="kartyat">Adja meg a kártya tulajdonosának a nevét:</label>
                    <input type="text" name="kartyat" id="kartyat">
                </div>
                <div class="col3-penzfeltoltes">
                    <label for="osszeg">Adja meg a kívánt összeget:</label>
                    <input type="text" name="osszeg" id="osszeg">
                </div>
            </div>
        </div>

        <div class="penzkifizetes">

            <div class="grid-container-penzkifizetes">
                <div class="col1-penzkifizetes">
                    <label for="kartyaszam">Adja meg a kártyaszámot:</label>
                    <input type="text" name="kartyaszam" id="kartyaszam">

                </div>
                <div class="col2-penzkifizetes">
                    <label for="kartyat">Adja meg a kártya tulajdonosának a nevét:</label>
                    <input type="text" name="kartyat" id="kartyat">
                </div>

                <div class="col3-penzkifizetes">

                    <label for="osszeg">Adja meg a kívánt összeget:</label>
                    <input type="text" name="osszeg" id="osszeg">
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>