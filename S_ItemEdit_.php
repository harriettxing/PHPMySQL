<?php include("_app.php");?>
<!--  S_ItemEdit_.php         -->
<!--  Ken Cressman            -->
<!--  2006.06.29 - 2006.11.20 -->
<?php $TitleTag = "Edit Library Item (Action)";?>
<?php $FocalCore = "";?>


<?php include("Include/AccessControl_Supply.php");?>


<head>
   <title> <?php echo $AppName;?> - <?php echo $TitleTag;?> </title>
   <link rel="StyleSheet" href="<?php echo $thestyle;?>" type="text/css" id="stylesheet">
   <?php include("Include/jsFocus4.php");?>
</head>


<body onLoad="placeFocus()">


<div align="center" class="txt3">


<?php


   // Block observers
   if($membership["RoleB"] == 1)
     {include("Include/BlockOb.php");           exit;}


// ////////////////// Allow for incoming params ////////////////// //
if($_POST['Go'] && strlen($_POST['Go']))
  {   $Go = trim($_POST['Go']); }
else
  {   if($_REQUEST['Go'] && strlen($_REQUEST['Go']))
        {   $Go = trim($_REQUEST['Go']); }
      else
        {   $Go = "bye"; }
   }
$GoList60 = "Add,Mod,Del,Cpy";                          // ---AIJ--- //
$GoSet60 = explode(",", $GoList60);
if(array_search(trim($Go), $GoSet60) === false) { $Go = "nowhere"; }
// ////// //////////////////////////////////// ////// //
if($_POST['ID923'] && strlen($_POST['ID923']))
  {   $ID923 = trim($_POST['ID923']); }
else
  {   if($_REQUEST['ID923'] && strlen($_REQUEST['ID923']))
        {   $ID923 = trim($_REQUEST['ID923']); }
      else
        {   $ID923 = "0"; }
   }
if(!is_numeric($ID923))    $ID923 = 0;   // ---AIJ--- //
// ////// //////////////////////////////////// ////// //
if($_POST['ID193'] && strlen($_POST['ID193']))
  {   $ID193 = trim($_POST['ID193']); }
else
  {   if($_REQUEST['ID193'] && strlen($_REQUEST['ID193']))
        {   $ID193 = trim($_REQUEST['ID193']); }
      else
        {   $ID193 = 1; }
   }
if(!is_numeric($ID193))    $ID193 = 1;   // ---AIJ--- //
// ////// //////////////////////////////////// ////// //
if($_POST['Item'] && strlen($_POST['Item']))
  {   $Item = trim($_POST['Item']); }
else
  {   if($_REQUEST['Item'] && strlen($_REQUEST['Item']))
        {   $Item = trim($_REQUEST['Item']); }
      else
        {   $Item = ""; }
   }
// ////// //////////////////////////////////// ////// //
if($_POST['Manu'] && strlen($_POST['Manu']))
  {   $Manu = trim($_POST['Manu']); }
else
  {   if($_REQUEST['Manu'] && strlen($_REQUEST['Manu']))
        {   $Manu = trim($_REQUEST['Manu']); }
      else
        {   $Manu = ""; }
   }
// ////// //////////////////////////////////// ////// //
if($_POST['Model'] && strlen($_POST['Model']))
  {   $Model = trim($_POST['Model']); }
else
  {   if($_REQUEST['Model'] && strlen($_REQUEST['Model']))
        {   $Model = trim($_REQUEST['Model']); }
      else
        {   $Model = ""; }
   }
// ////// //////////////////////////////////// ////// //
if($_POST['Serial'] && strlen($_POST['Serial']))
  {   $Serial = trim($_POST['Serial']); }
else
  {   if($_REQUEST['Serial'] && strlen($_REQUEST['Serial']))
        {   $Serial = trim($_REQUEST['Serial']); }
      else
        {   $Serial = ""; }
   }
// ////// //////////////////////////////////// ////// //
if($_POST['Cost'] && strlen($_POST['Cost']))
  {   $Cost = trim($_POST['Cost']); }
else
  {   if($_REQUEST['Cost'] && strlen($_REQUEST['Cost']))
        {   $Cost = trim($_REQUEST['Cost']); }
      else
        {   $Cost = "0.01"; }
   }
if(!is_numeric($Cost))    $Cost = 0.01;   // ---AIJ--- //

// ////// //////////////////////////////////// ////// //
if($_POST['BarCode2'] && strlen($_POST['BarCode2']))
  {   $BarCode2 = trim($_POST['BarCode2']); }
else
  {   if($_REQUEST['BarCode2'] && strlen($_REQUEST['BarCode2']))
        {   $BarCode2 = trim($_REQUEST['BarCode2']); }
      else
        {   $BarCode2 = ""; }
   }


// ////// //////////////////////////////////// ////// //
if($_POST['Station'] && strlen($_POST['Station']))
  {   $Station = trim( $_POST['Station']); }
else
  {   if($_REQUEST['Station'] && strlen($_REQUEST['Station']))
        {   $Station = trim($_REQUEST['Station']); }
      else
        {   $Station = ""; }
  }


   // ////// //////////////////////////////////// ////// //
if($_POST['ID031'] && strlen($_POST['ID031']))
  {   $ID031 = trim($_POST['ID031']); }
else
  {   if($_REQUEST['ID031'] && strlen($_REQUEST['ID031']))
        {   $ID031 = trim($_REQUEST['ID031']); }
      else
        {   $ID031 = 1; }
   }
if(!is_numeric($ID031))    $ID031 = 1;   // ---AIJ--- //
// ////// //////////////////////////////////// ////// //
if($_POST['ID194'] && strlen($_POST['ID194']))
  {   $ID194 = trim($_POST['ID194']); }
else
  {   if($_REQUEST['ID194'] && strlen($_REQUEST['ID194']))
        {   $ID194 = trim($_REQUEST['ID194']); }
      else
        {   $ID194 = 1; }
   }
if(!is_numeric($ID194))    $ID194 = 1;   // ---AIJ--- //
// ////// //////////////////////////////////// ////// //
if($_POST['ID074'] && strlen($_POST['ID074']))
  {   $ID074 = trim($_POST['ID074']); }
else
  {   if($_REQUEST['ID074'] && strlen($_REQUEST['ID074']))
        {   $ID074 = trim($_REQUEST['ID074']); }
      else
        {   $ID074 = "3"; }      // ////// 3 = property officer ////// //
   }
if(!is_numeric($ID074))    $ID074 = 3;   // ---AIJ--- //
// ////// //////////////////////////////////// ////// //
if($_POST['Note8'] && strlen($_POST['Note8']))
  {   $Note8 = htmlspecialchars(trim($_POST['Note8']), ENT_QUOTES); }
else
  {   if($_REQUEST['Note8'] && strlen($_REQUEST['Note8']))
        {   $Note8 = htmlspecialchars(trim($_REQUEST['Note8'], ENT_QUOTES)); }
      else
        {   $Note8 = ""; }
   }
// ////// //////////////////////////////////// ////// //
                                                  if($Go == "Cpy") { // Cpy //
// ////// //////////////////////////////////// ////// //
if($_POST['SubList0'] && strlen($_POST['SubList0']))
  {   $SubList0 = trim($_POST['SubList0']); }
else
  {   if($_REQUEST['SubList0'] && strlen($_REQUEST['SubList0']))
        {   $SubList0 = trim($_REQUEST['SubList0']); }
      else
        {   $SubList0 = "n"; }
   }
// ////// //////////////////////////////////// ////// //
                                                                    } // Cpy //


// Set the default redirection destination
$tgt = $codebase."S_Item_.php?Genus=IDE&par303=".$ID923;


   // Determine if the user arrived via the form &/or w/ the right data
   if(!$ID193 && !$ID923)
     {include("Include/WrongWay.php");          exit;       }


   // Dupe check
   if($Go == "Add" || $Go == "Cpy" || $Go == "Mod")
     {
      $query="
            SELECT      EID
            FROM        Eqp
            WHERE       1 = 1
            AND (
                  (BarCode2 = ".$BarCode2.")
                 OR
                  (1 = 2
                   AND 2 = 3
                   AND 3 = 4
                   )
                 )
            AND         EID <> ".$ID923."
            ";
      if($IYK >= 7) { // In your knickers, level 7 //
      echo "<div align=\"left\"><pre>".$query."</pre></div>"; // exit;
                     } // In your knickers, level 7 //
      // Execute the query
      $dupe = mysqli_query($link, $query);
      // echo "<h3> ".mysqli_num_rows($dupe)." </h3><hr><p>";
      if(mysqli_num_rows($dupe))
        {
         echo "
               <div align=\"center\" class=\"txt3\">
               This item already exists in the library.<br>
               You may not create a duplicate entry.<p>
               Please use the &#147;Back&#148; button to modify your entry<br>
               or click on &#147;Cancel&#148; below to continue.<p>
               <form action=\"S_index.php\" method=\"get\">
               <input type=\"submit\" value=\"Cancel\">
               </form>
               </div>
               ";
         exit;
         }
      }


   // Add/Copy Section ////////////////////////////////////////
   if($Go == "Add" || $Go == "Cpy")
     {
      // echo "------Add/Cpy------<p>";


      $query="
            INSERT INTO Eqp
            SET         ECID = ".$ID193.",
                        Item = '".$Item."',
                        Manu = '".$Manu."',
                        Model = '".$Model."',
                        Serial = '".$Serial."',
                        Cost = ".$Cost.",
                        BarCode2 = '".$BarCode2."',
                        OWID = ".$ID031.",
                        RmID = ".$ID194.",
                        LocID = ".$ID074.",
                        Station = '".$Station."',
                        Note8 = '".$Note8."',
                        Creator = ".$membership['HumID'].",
                        EntryDate = '".$timehack."',
                        Editor = ".$membership['HumID'].",
                        ModDate = '".$timehack."'
                        ";
      if($IYK >= 5) { // In your knickers, level 5 //
      echo "<div align=\"left\"><pre>".$query."</pre></div>"; // exit;
                     } // In your knickers, level 5 //
      // Execute the query
      $goadd = mysqli_query($link, $query);
      // Ensure the db query worked
      if(!$goadd)
        {echo "<!--ErrX-->"; include("Include/DBError.php"); exit; }


      // Find the ID of the new entry
      $query="
            SELECT      EID AS ID
            FROM        Eqp
            WHERE       Item = '".$Item."'
            AND         BarCode2 = '".$BarCode2."'
            AND         Creator = ".$membership['HumID']."
            AND         EntryDate = '".$timehack."'
            ORDER BY    EID DESC
                        ";
      if($IYK >= 6) { // In your knickers, level 6 //
      echo "<div align=\"left\"><pre>".$query."</pre></div>"; // exit;
                     } // In your knickers, level 6 //
      // Execute the query
      $NewID = mysqli_query($link, $query);
      // Ensure the db query worked
      if(!$NewID)
        {echo "<!--ErrQ-->"; include("Include/DBError.php"); exit; }
      $rowID = mysqli_fetch_assoc($NewID);
      $ID923 = $rowID["ID"];


      // Adjust the default redirection destination
      $tgt = $codebase."S_Item_.php?Genus=IDE&par303=".$ID923;


            // Copy Sub-section ////////////////////////////////////////
            if($Go == "Cpy")
              {
               // echo "------{Cpy}------<p>";

               // Perform fn's unique to copying (e.g., copy spptd langs)


                  // Copy pictures
                  if($SubList0 && $SubList0 != "n")
                    {
                     $ListX = $SubList0;
                     include("Include/CopySubItems_S.php");
                     }


               } // END Copy Sub-section ///////////////////////////////


      } // END Add/Copy Section ///////////////////////////////


   // Mod Section ////////////////////////////////////////
   if($Go == "Mod")
     {
      // echo "------Mod------<p>";


      $query="
            UPDATE      Eqp
            SET         ECID = ".$ID193.",
                        Item = '".$Item."',
                        Manu = '".$Manu."',
                        Model = '".$Model."',
                        Serial = '".$Serial."',
                        Cost = ".$Cost.",
                        BarCode2 = '".$BarCode2."',
                        OWID = ".$ID031.",
                        RmID = ".$ID194.",
                        LocID = ".$ID074.",
                        Station = '".$Station."',
                        Note8 = '".$Note8."',
                        Editor = ".$membership['HumID'].",
                        ModDate = '".$timehack."'
            WHERE       EID = ".$ID923."
                        ";
      if($IYK >= 5) { // In your knickers, level 5 //
      echo "<div align=\"left\"><pre>".$query."</pre></div>"; // exit;
                     } // In your knickers, level 5 //
      // Execute the query
      $gomod = mysqli_query($link, $query);
      // Ensure the db query worked
      if(!$gomod)
        {echo "<!--ErrY-->"; include("Include/DBError.php"); exit; }


      } // END Mod Section ///////////////////////////////


   // Del Section ////////////////////////////////////////
   if($Go == "Del")
     {
      // echo "------Del------<p>";


      // Build the pre-deletion query
      $query="
         DELETE FROM    EqpLoans
         WHERE          EID = ".$ID923."
                        ";
      if($IYK >= 5) { // In your knickers, level 5 //
      echo "<div align=\"left\"><pre>".$query."</pre></div>"; // exit;
                     } // In your knickers, level 5 //
      // Execute the query
      $godel = mysqli_query($link, $query);
      // Ensure the db query worked
      if(!$godel)
        {echo "<!--ErrA-->"; include("Include/DBError.php"); exit; }


      // Build the pre-deletion query
      $query="
         DELETE FROM    EqpPixCnxn
         WHERE          EID = ".$ID923."
                        ";
      if($IYK >= 5) { // In your knickers, level 5 //
      echo "<div align=\"left\"><pre>".$query."</pre></div>"; // exit;
                     } // In your knickers, level 5 //
      // Execute the query
      $godel = mysqli_query($link, $query);
      // Ensure the db query worked
      if(!$godel)
        {echo "<!--ErrB-->"; include("Include/DBError.php"); exit; }


      // Build the deletion query
      $query="
         DELETE FROM    Eqp
         WHERE          EID = ".$ID923."
                        ";
      if($IYK >= 5) { // In your knickers, level 5 //
      echo "<div align=\"left\"><pre>".$query."</pre></div>"; // exit;
                     } // In your knickers, level 5 //
      // Execute the query
      $godel = mysqli_query($link, $query);
      // Ensure the db query worked
      if(!$godel)
        {echo "<!--ErrZ-->"; include("Include/DBError.php"); exit; }


      // Set the default redirection destination
      $tgt = $codebase."S_index.php";


      } // END Del Section ///////////////////////////////


 ?>


   <p>&nbsp;<p>


   The changes you requested have been made. <p>


   <?php if($Go == "Del") { ?>
   <form action="<?php echo $codebase;?>S_index.php" method="post" name="form09">
   <?php } else { ?>
   <form action="<?php echo $codebase;?>S_Item_.php" method="post" name="form09">
   <?php } ?>
      <input type="submit" value="Continue" name="sub09" class="btn3 wde">
      <input type="hidden" name="par303" value="<?php echo $ID923;?>">
      <input type="hidden" name="Genus" value="IDE">
   </form>


</div>


</body>
</html>


<?php if($membership['JSRedirect']) { // JSRedirect option per user pref //   ?>
<?php // echo "<p>.Safe-T.<p>"; exit;?>
<script language="JavaScript">
   <!--//
   self.location = '<?php echo $tgt;?>';
   // -->
</script>
<?php } ?>


<!--  2006.06.29 - 2006.0X.XX - Initial replication & dev//KC                -->
<!--  2006.11.20 - UI mod//KC                                                -->
<!--  2008.05.13 - Modified to support new photo scheme//KC.                 -->
<!--  2010.11.03 - 2010.11.04 - Atomic split update//KC                      -->

