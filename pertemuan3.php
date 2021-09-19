<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sistem Keamanan Data</title>
</head>

<body>

<div class="kotak_dekripsi">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>SISTEM KEAMANAN DATA</b></h1>
                <br>
            </div>
            <div class="card-body">
                <?php
                if (isset($_POST['enkripsi'])) { 
                    function cipher($char, $key)
                    { 
                        if (ctype_alpha($char)) { 
                            $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                            $ch = ord($char); 
                            $mod = fmod($ch + $key - $nilai, 26); 
                            $hasil = chr($mod + $nilai); 
                            return $hasil; 
                        } else { 
                            return $char;
                        }
                    }

                   
                    function enkripsi($input, $key)
                    {
                        $output = ""; 
                        $chars = str_split($input); 
                        foreach ($chars as $char) { 
                            $output .= cipher($char, $key);
                        }
                        return $output; 
                    }
                    
                    function dekripsi($input, $key)
                    {
                        return enkripsi($input, 26 - $key); 
                    }

                    //jika tombol dekripsi yang ditekan
                } else if (isset($_POST['dekripsi'])) {
                    function cipher($char, $key)
                    { //buat fungsi cipher 
                        if (ctype_alpha($char)) {
                            $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                            $ch = ord($char); 
                            $mod = fmod($ch + $key - $nilai, 26); 
                            $hasil = chr($mod + $nilai); 
                            return $hasil;
                        } else { 
                            return $char;
                        }
                    }

                    //buat fungsi enkripsi
                    function enkripsi($input, $key)
                    {
                        $output = ""; 
                        $chars = str_split($input);
                        foreach ($chars as $char) { 
                            $output .= cipher($char, $key); 
                        }
                        return $output; 
                    }

                    //buat fungsi dekripsi
                    function dekripsi($input, $key)
                    {
                        return enkripsi($input, 26 - $key); 
                    }
                }
                ?>

                <!-- Form  -->
                <form name="skd" method="post">
                    <!-- Form input text -->
                    <div class="input-group mb-3">
                        <input type="text" name="plain" class="form_dekripsi" placeholder="Input Text">
                    </div>
                    <!-- Form input key -->
                    <div class="input-group mb-3">
                        <input type="number" name="key" class="form_dekripsi" placeholder="Input Key" min=1 max=30>
                    </div>
                    <div class="box-footer">
                        <table class="table table-stripped">
                            <tr>
                                <!-- button enkripsi dan dekripsi -->
                                <td><input class="tombol_dekripsi" type="submit" name="enkripsi" value="Enkripsi" ></td>
                                <td><input class="tombol_dekripsi" type="submit" name="dekripsi" value="Dekripsi" ></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
            <!-- Hasil enkripsi/dekripsi -->
            <div class="card-header text-center">
                <br>
                <br>
                <h2><b>HASIL</b></h2>
                <br>
            </div>
            <div class="card-body">
                <table>
                    <!-- Menampilkan hasil output dari enkripsi/dekripsi -->
                    
                    <tr>
                        <!-- menampilkan text yang dimasukkan -->
                        <td>Text yang diinput    : </td>
                        <td><b>
                                <?php if (isset($_POST['enkripsi'])) { 
                                    echo dekripsi(enkripsi($_POST['plain'], $_POST['key']), $_POST['key']); 
                                }
                                if (isset($_POST['dekripsi'])) { 
                                    echo enkripsi(dekripsi($_POST['plain'], $_POST['key']), $_POST['key']); 
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Key                     : </td>
                        <td><b><?php if (isset($_POST['enkripsi'])) { 
                                    echo $_POST['key'];
                                }
                                if (isset($_POST['dekripsi'])) { 
                                    echo $_POST['key']; 
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td> Hasil Input Text  : </td>
                        <td><b>
                                <?php if (isset($_POST['enkripsi'])) { 
                                    echo enkripsi($_POST['plain'], $_POST['key']); 
                                }
                                if (isset($_POST['dekripsi'])) { 
                                    echo dekripsi($_POST['plain'], $_POST['key']); 
                                } ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </form>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

        })
    </script>
</body>

</html>