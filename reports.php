<?php
    include "./api/config.php";
    session_start();
    $conn2 = new mysqli("localhost", "root", "", "reseller");

    $ref_year = date('Y')-1;
    $cur_year = Date('Y');
    $ref_month = date('m');
    $cur_month = date('m');
    $conbis = 'any';
    $renewal = 'any';
    $year = 'any';

    if(isset($_GET['year'])){
        $ref_year = $_GET['ref_year'];
        $cur_year = $_GET['ref_year']+1;
        $ref_month = $_GET['ref_month'];
        $cur_month = $_GET['ref_month'];

        $conbis = $_GET['conbis'];
        $renewal = $_GET['renewal'];
        $year = $_GET['year'];
    }

?>
<html lang="en">
   <head>
      <style>
         @import url("https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
         .pcs:after {
         content: " pcs";
         }
         .cur:before {
         content: "$";
         }
         .per:after {
         content: "%";
         }
         * {
         box-sizing: border-box;
         }
         body {
         padding: .2em 2em;
         }
         table {
         width: 100%;
         }
         table th {
         text-align: left;
         border-bottom: 1px solid #ccc;
         }
         table th, table td {
         padding: .4em;
         }
         table.fold-table > tbody > tr.view td, table.fold-table > tbody > tr.view th {
         cursor: pointer;
         }
         table.fold-table > tbody > tr.view td:first-child,
         table.fold-table > tbody > tr.view th:first-child {
         position: relative;
         padding-left: 20px;
         }
         table.fold-table > tbody > tr.view td:first-child:before,
         table.fold-table > tbody > tr.view th:first-child:before {
         position: absolute;
         top: 50%;
         left: 5px;
         width: 9px;
         height: 16px;
         margin-top: -8px;
         font: 16px fontawesome;
         color: #999;
         content: "\f0d7";
         transition: all .3s ease;
         }
         table.fold-table > tbody > tr.view:nth-child(4n-1) {
         background: #eee;
         }
         table.fold-table > tbody > tr.view:hover {
         background: #ff8533;
         }
         table.fold-table > tbody > tr.view.open {
         background: #ff6600;
         color: white;
         }
         table.fold-table > tbody > tr.view.open td:first-child:before, table.fold-table > tbody > tr.view.open th:first-child:before {
         transform: rotate(-180deg);
         color: #333;
         }
         table.fold-table > tbody > tr.fold {
         display: none;
         }
         table.fold-table > tbody > tr.fold.open {
         display: table-row;
         }
         .fold-content {
         padding: .5em;
         }
         .fold-content h3 {
         margin-top: 0;
         }
         .fold-content > table {
         border: 2px solid #ccc;
         }
         .fold-content > table > tbody tr:nth-child(even) {
         background: #eee;
         }
      </style>
      <link rel="stylesheet" href="./style/bootstrap.min.css">
            <script src="./script/jquery.min.js"></script>
            <script src="./script/bootstrap.min.js"></script>
      <script>
         $(function(){
           $(".fold-table tr.view").on("click", function(){
             $(this).toggleClass("open").next(".fold").toggleClass("open");
           });
         });

      </script>
   </head>
   <body>
      <div class="container" style="line-height:2.5">
         <div class="row">
            <div style="font-size: 22px;" class="col-md-6">
               Sections
            </div>
            <div class="col-md-6">
            </div>
         </div>
         <div class="row">
            <div style=" text-decoration: underline; font-size: 17px;"  class="col-md-6">
               Reference period:
            </div>
            <div style=" text-decoration: underline; font-size: 17px;" class="col-md-6">
               Current period:
            </div>
         </div>
         <div class="row">
            <div class="col-md-2">
               Year
            </div>
            <div class="col-md-3">
                <select id="ref_year">

                 <option value="2010">2010</option>
                 <option value="2011">2011</option>
                 <option value="2012">2012</option>
                 <option value="2013">2013</option>
                 <option value="2014">2014</option>
                 <option value="2015">2015</option>
                 <option value="2016">2016</option>
                 <option value="2017">2017</option>
                 <option value="2018">2018</option>
               </select>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
               Year
            </div>
            <div class="col-md-3">
                <select id="cur_year" disabled>
                 <option value="<?php echo $ref_year;?>"> <?php echo $ref_year;?> </option>
                 <option value="2010">2010</option>
                 <option value="2011">2011</option>
                 <option value="2012">2012</option>
                 <option value="2013">2013</option>
                 <option value="2014">2014</option>
                 <option value="2015">2015</option>
                 <option value="2016">2016</option>
                 <option value="2017">2017</option>
                 <option value="2018">2018</option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="col-md-2">
               Month
            </div>
            <div class="col-md-3">
               <select id="ref_month">
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                              <option value="11">11</option>
                                              <option value="12">12</option>

                              </select>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
               Month
            </div>
            <div class="col-md-3">
               <select id="cur_month" disabled>
                                                             <option value="1">1</option>
                                                             <option value="2">2</option>
                                                             <option value="3">3</option>
                                                             <option value="4">4</option>
                                                             <option value="5">5</option>
                                                             <option value="6">6</option>
                                                             <option value="7">7</option>
                                                             <option value="8">8</option>
                                                             <option value="9">9</option>
                                                             <option value="10">10</option>
                                                             <option value="11">11</option>
                                                             <option value="12">12</option>

                                             </select>
            </div>
         </div>
         <div class="row">
            <div  style=" text-decoration: underline; font-size: 17px;" class="col-md-6">
               Filters
            </div>
            <div class="col-md-6">
            </div>
         </div>
         <div class="row">
            <div class="col-md-3">
                <input type="radio" name="conbis" value="C"> Consumer
                 <input type="radio" name="conbis" value="B"> Business
                 <input type="radio" name="conbis" value="any"> Any
            </div>
            <div class="col-md-3">
                 <input type="radio" name="renewal" value="R"> Renewal
                 <input type="radio" name="renewal" value="N"> New Business
                 <input type="radio" name="renewal" value="any"> Any
            </div>
            <div class="col-md-3">
            Year
              <select id="year">
                                                                           <option value="any">Any</option>
                                                                           <option value="1">1</option>
                                                                           <option value="2">2</option>
                                                                           <option value="3">3</option>


                                                           </select>
            </div>
            <div>
                 <button onclick="submit();" class="btn btn-primary button-loading" type="button">Go!</button>
            </div>
         </div>
      </div>
      <table style="margin-top: 20px; margin-bottom: 30px;  border-left: 1px solid #cbc9c9; border-bottom: 1px solid #cbc9c9; border-right: 1px solid #cbc9c9;" class="fold-table">
         <thead>
            <tr style="border-top: 1px solid #cbc9c9;">
               <th></th>
               <th></th>
               <th style="border-right: 1px solid #cbc9c9; border-left: 1px solid #cbc9c9; text-align: center;" colspan="5" scope="colgroup">Reference Period</th>
               <th style="border-right: 1px solid #cbc9c9; text-align: center;" colspan="5" scope="colgroup">Current Period</th>
            </tr>
            <tr>
               <th>ID</th>
               <th style="border-right: 1px solid #cbc9c9;">Name</th>
               <th>New Sales</th>
               <th>Renewal Sales</th>
               <th>New Sales Points</th>
               <th>Renewal Sales Points</th>
               <th style="border-right: 1px solid #cbc9c9;">Total Points</th>
               <th>New Sales</th>
               <th>Renewal Sales</th>
               <th>New Sales Points</th>
               <th>Renewal Sales Points</th>
               <th style="border-right: 1px solid #cbc9c9;">Total Points</th>
               <th style="border-top: 1px solid #cbc9c9;">Growth</th>
            </tr>
         </thead>
         <tbody>

   <?php
                             $n = 'N';
                             $r = 'R';
                             $filter1 = '';
                             if($conbis=='B'){
                                $filter1 = " and md.segment='B' ";
                             } else if($conbis=='C'){
                                $filter1 = " and md.segment='C' ";
                             }

                             if($year=='1'){
                                $filter1 .= " and md.lisence_term='1' ";
                             } else if($year=='2'){
                                $filter1 .= " and md.lisence_term='2' ";
                             }
                             else if($year=='3'){
                                $filter1 .= " and md.lisence_term='3' ";
                             }

                             if($renewal == 'R'){
                                $n = '-';
                             }
                             else if($renewal == 'N'){
                                $r = '-';
                             }




                             $sql = "select * from (select DISTINCT(p.id), p.company_name,


                                     IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.purchase_type = '".$n."' ".$filter1." and  md.year=".$ref_year." and md.month=".$ref_month."),0) as ref_new_sales,

                                     IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.purchase_type = '".$r."' ".$filter1." and  md.year=".$ref_year." and md.month=".$ref_month."),0) as ref_resale,

                                     IFNULL((select sum(md.end_user_amount)*1.5 from monthly_data md where md.id = p.id and md.purchase_type = '".$n."' ".$filter1." and md.year=".$ref_year." and md.month=".$ref_month."),0) as ref_new_sales_points,

                                     IFNULL((select sum(md.end_user_amount)*0.7 from monthly_data md where md.id = p.id and md.purchase_type = '".$r."' ".$filter1." and  md.year=".$ref_year." and md.month=".$ref_month."),0) as ref_resale_points,


                                     IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.year=".$ref_month." ".$filter1." and md.month = ".$ref_month."),0) as ref_total_sales,

                                     IFNULL((select ref_new_sales_points+ref_resale_points),0) as ref_total_points,

                                     IFNULL((select t.id from tier t where ref_total_sales BETWEEN t.value_to and t.value_from),0) as ref_tier,



                                     IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.purchase_type = '".$n."' ".$filter1." and  md.year=".$cur_year." and md.month=".$cur_month."),0) as cur_new_sales,

                                     IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.purchase_type = '".$r."' ".$filter1." and  md.year=".$cur_year." and md.month=".$cur_month."),0) as cur_resale,

                                     IFNULL((select sum(md.end_user_amount)*1.5 from monthly_data md where md.id = p.id and md.purchase_type = '".$n."' ".$filter1." and  md.year=".$cur_year." and md.month=".$cur_month."),0) as cur_new_sales_points,

                                     IFNULL((select sum(md.end_user_amount)*0.7 from monthly_data md where md.id = p.id and md.purchase_type = '".$r."' ".$filter1." and  md.year=".$cur_year." and md.month=".$cur_month."),0) as cur_resale_points,



                                     IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.year=".$cur_year." ".$filter1." and md.month = ".$cur_month." ),0) as curr_total_sales,

                                     IFNULL((select cur_new_sales_points+cur_resale_points),0) as cur_total_points,

                                     IFNULL((select t.id from tier t where curr_total_sales BETWEEN t.value_to and t.value_from),0) as cur_tier,

                                     IFNULL((select ((IF(cur_total_points=0,0,cur_total_points)/IF(ref_total_points=0,cur_total_points,ref_total_points)))*100),0) as growth





                                     from partner p, monthly_data md

                                     where p.id = md.id
) as temp
where temp.ref_total_points != 0 or temp.cur_total_points !=0
order by temp.cur_tier
                                     ";
                             $result = $conn->query($sql);


                             if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {


                         ?>


            <tr class="view" onclick="toggleDetails(<?php echo $row['id']; ?>)" style="background: white;">
               <td><?php echo $row['id']; ?></td>
               <td style="border-right: 1px solid #cbc9c9;"><?php echo $row['company_name']; ?></td>
               <td class=""><?php echo $row['ref_new_sales']; ?></td>
               <td class=""><?php echo $row['ref_resale']; ?></td>
               <td><?php echo $row['ref_new_sales_points']; ?></td>
               <td class=""><?php echo $row['ref_resale_points']; ?></td>
               <td style="border-right: 1px solid #cbc9c9;" class=""><?php echo $row['ref_total_points']; ?></td>

                <td class=""><?php echo $row['cur_new_sales']; ?></td>
                <td class=""><?php echo $row['cur_resale']; ?></td>
                <td><?php echo $row['cur_new_sales_points']; ?></td>
                <td class=""><?php echo $row['cur_resale_points']; ?></td>

                <td style="border-right: 1px solid #cbc9c9;" class=""><?php echo $row['cur_total_points']; ?></td>
                <td class=""><?php echo round($row['growth'],2); ?>%</td>
            </tr>


               <?php
$n = 'N';
                             $r = 'R';
                 $filter2 = '';
                                             if($conbis=='B'){
                                                $filter2 = " and segment='B' ";
                                             } else if($conbis=='C'){
                                                $filter2 = " and segment='C' ";
                                             }

                                              if($year=='1'){
                                                                             $filter2 .= " and lisence_term='1' ";
                                                                          } else if($year=='2'){
                                                                             $filter2 .= " and lisence_term='2' ";
                                                                          }
                                                                          else if($year=='3'){
                                                                             $filter2 .= " and lisence_term='3' ";
                                                                          }

                                                                            if($renewal == 'R'){
                                                                                                          $n = '-';
                                                                                                       }
                                                                                                       else if($renewal == 'N'){
                                                                                                          $r = '-';
                                                                                                       }


                $sql2 = "SET @currNum1=0,@refNum1=0, @currNum2=0,@refNum2=0;

                         select * from
                         (SELECT DISTINCT(temp.rowNum1), IFNULL(temp.cur_new_sale,'-') as cur_new_sale, IFNULL(temp.cur_resale,'-') as cur_resale, IFNULL(temp.cur_new_sales_points,'-') as cur_new_sales_points, IFNULL(temp.cur_resale_points,'-') as cur_resale_points, IFNULL(temp.ref_new_sale,'-') as ref_new_sale, IFNULL(temp.ref_resale,'-') as ref_resale, IFNULL(temp.ref_new_sales_points,'-') as ref_new_sales_points, IFNULL(temp.ref_resale_points,'-') as ref_resale_points

                         from (

                         (select curr1.*, ref1.*

                         from

                         (select @currNum1:=@currNum1+1 AS rowNum1,
                         IF(purchase_type='".$n."',end_user_amount,'-') as cur_new_sale,
                         IF(purchase_type='".$r."',end_user_amount,'-') as cur_resale,
                         IF(purchase_type='".$n."',end_user_amount*1.5,'-') as cur_new_sales_points,
                         IF(purchase_type='".$r."',end_user_amount*0.7,'-') as cur_resale_points

                         from monthly_data

                         where id = ".$row['id']."
                         and year = ".$ref_year."
                         ".$filter2."
                         and month = ".$ref_month.") as curr1

                         RIGHT OUTER JOIN

                         (select
                          @refNum1:=@refNum1+1 AS rowNum2,
                         IF(purchase_type='".$n."',end_user_amount,'-') as ref_new_sale,
                         IF(purchase_type='".$r."',end_user_amount,'-') as ref_resale,
                         IF(purchase_type='".$n."',end_user_amount*1.5,'-') as ref_new_sales_points,
                         IF(purchase_type='".$r."',end_user_amount*0.7,'-') as ref_resale_points

                         from monthly_data

                         where id = ".$row['id']."
                         and year = ".$cur_year."
                         ".$filter2."
                         and month = ".$ref_month.") as ref1

                         on ref1.rowNum2 = curr1.rowNum1)


                         UNION ALL

                         (select curr2.*, ref2.*

                         from

                         (select @currNum2:=@currNum2+1 AS rowNum3,
                         IF(purchase_type='".$n."',end_user_amount,'-') as cur_new_sale,
                         IF(purchase_type='".$r."',end_user_amount,'-') as cur_resale,
                         IF(purchase_type='".$n."',end_user_amount*1.5,'-') as cur_new_sales_points,
                         IF(purchase_type='".$r."',end_user_amount*0.7,'-') as cur_resale_points

                         from monthly_data

                         where id = ".$row['id']."
                         and year = ".$ref_year."
                         ".$filter2."
                         and month = ".$ref_month.") as curr2

                         LEFT OUTER JOIN

                         (select
                          @refNum2:=@refNum2+1 AS rowNum4,
                         IF(purchase_type='".$n."',end_user_amount,'-') as ref_new_sale,
                         IF(purchase_type='".$r."',end_user_amount,'-') as ref_resale,
                         IF(purchase_type='".$n."',end_user_amount*1.5,'-') as ref_new_sales_points,
                         IF(purchase_type='".$r."',end_user_amount*0.7,'-') as ref_resale_points

                         from monthly_data

                         where id = ".$row['id']."
                         and year = ".$cur_year."
                         ".$filter2."
                         and month = ".$ref_month.") as ref2

                         on ref2.rowNum4 = curr2.rowNum3)

                         ) as temp) a
                                  where (cur_new_sale != '-' or cur_resale != '-' or cur_new_sales_points != '-' or	cur_resale_points != '-' or ref_new_sale !='-' or	ref_resale != '-' or ref_new_sales_points !='-' or ref_resale_points != '-') = true";

                //echo $sql2 . "<br><br>";

                if ($conn2->multi_query($sql2)) {
                    do {
                        /* store first result set */
                        if ($result2 = $conn2->store_result()) {

                            while ($row2 = $result2->fetch_row()) {

                                ?>

                                            <tr style="display: none;" class="subData<?php echo $row['id']; ?>">
                                               <td></td>
                                               <td></td>
                                               <td class="" style="border-left: 1px solid #cbc9c9;"><?php echo $row2[1]; ?></td>
                                               <td class=""><?php echo $row2[2]; ?></td>
                                               <td><?php echo $row2[3]; ?></td>
                                               <td class=""><?php echo $row2[4]; ?></td>
                                               <td style="border-right: 1px solid #cbc9c9;" class=""></td>

                                               <td class=""><?php echo $row2[5]; ?></td>
                                               <td class=""><?php echo $row2[6]; ?></td>
                                               <td><?php echo $row2[7]; ?></td>
                                               <td class=""><?php echo $row2[8]; ?></td>

                                               <td style="border-right: 1px solid #cbc9c9;" class=""></td>
                                               <td class=""></td>
                                            </tr>

                            <?php

                            }

                            $result2->free();

                        }

                    } while ($conn2->next_result());
                }

               ?>










<?php
       }
                             } else {
                                 echo "No record found!";
                             }

?>


         </tbody>
      </table>
   </body>
</html>
<script>
    function toggleDetails(id){
        if($('.subData'+id).css('display') == 'none'){
            $('.subData'+id).css('display', '');
        }
        else{
            $('.subData'+id).css('display', 'none');
        }
    }

    $( document ).ready(function() {
        $("#ref_year option").each(function() {
               if( $(this).prop('value') == <?php echo $ref_year; ?> ) { $(this).prop('selected','selected'); }
           });

           $("#cur_year option").each(function() {
                          if( $(this).prop('value') == <?php echo $cur_year; ?> ) { $(this).prop('selected','selected'); }
                      });

           $("#ref_month option").each(function() {
                if( $(this).prop('value') == <?php echo $ref_month; ?> ) { $(this).prop('selected','selected'); }
           });

             $("#cur_month option").each(function() {
                           if( $(this).prop('value') == <?php echo $cur_month; ?> ) { $(this).prop('selected','selected'); }
                      });

        $("#year option").each(function() {
                                   if( $(this).prop('value') == <?php echo "'" .$year . "'"; ?> ) { $(this).prop('selected','selected'); }
                              });

                               $("input[name=conbis][value='<?php echo $conbis; ?>']").attr('checked', true);
                               $("input[name=renewal][value='<?php echo $renewal; ?>']").attr('checked', true);
    });

    $('#ref_year').on('change', function() {
        $('#cur_year').val(parseInt(this.value)+1).change();
    });

    $('#ref_month').on('change', function() {
        $('#cur_month').val(this.value).change();
    });

    function submit(){

        var conbis = 'any';
        var renewal = 'any';
        if($('input[name=conbis]:checked').val()){
            conbis = $('input[name=conbis]:checked').val();
        }
        if($('input[name=renewal]:checked').val()){
            renewal = $('input[name=renewal]:checked').val();
        }

        window.location = "./reports.php?ref_year="+$("#ref_year").val()+"&ref_month="+$("#ref_month").val()+"&conbis="+conbis+"&renewal="+renewal+"&year="+$("#year").val();
    }


</script>
<!--

select p.id, p.company_name,

(select sum(md.end_user_amount) as a from monthly_data md where md.id = p.id and purchase_type = 'N' and STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') BETWEEN STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') AND STR_TO_DATE(CONCAT(2017,'-',LPAD('12',2,'00'),'-',LPAD('31',2,'00')), '%Y-%m-%d')) as ref_new_sales,

(select sum(md.end_user_amount) as a from monthly_data md where md.id = p.id and purchase_type = 'N' and STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') BETWEEN STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') AND STR_TO_DATE(CONCAT(2017,'-',LPAD('12',2,'00'),'-',LPAD('31',2,'00')), '%Y-%m-%d')) as ref_new_sales,





(select sum(md.end_user_amount) as a from monthly_data md where md.id = p.id and purchase_type = 'N' and STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') BETWEEN STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') AND STR_TO_DATE(CONCAT(2018,'-',LPAD('12',2,'00'),'-',LPAD('31',2,'00')), '%Y-%m-%d')) as cur_new_sales,

(select sum(md.end_user_amount) as a from monthly_data md where md.id = p.id and purchase_type = 'N' and STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') BETWEEN STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') AND STR_TO_DATE(CONCAT(2018,'-',LPAD('12',2,'00'),'-',LPAD('31',2,'00')), '%Y-%m-%d')) as cur_new_sales,




(select sum(md.end_user_amount) from monthly_data md where md.id = p.id and STR_TO_DATE(CONCAT(md.year,'-',LPAD(md.month,2,'00'),'-',LPAD('1',2,'00')), '%Y-%m-%d') BETWEEN '2017-03-01' AND '2018-03-01') as total_sale,


(select t.id from tier t where total_sale BETWEEN t.value_to and t.value_from) as tier



from partner p

where id = 2116

-->






<!--

select p.id, p.company_name,


IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.purchase_type = 'N' and md.year=2017 and md.month=2),0) as ref_new_sales,

IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.purchase_type = 'R' and  md.year=2017 and md.month=2),0) as ref_resale,

IFNULL((select sum(md.end_user_amount)*1.5 from monthly_data md where md.id = p.id and md.purchase_type = 'N' and md.year=2017 and md.month=2),0) as ref_new_sales_points,

IFNULL((select sum(md.end_user_amount)*0.7 from monthly_data md where md.id = p.id and md.purchase_type = 'R' and  md.year=2017 and md.month=2),0) as ref_resale_points,


IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.year=2017 and md.month = 2),0) as ref_total_sales,

IFNULL((select ref_new_sales_points+ref_resale_points),0) as ref_total_points,

IFNULL((select t.id from tier t where ref_total_sales BETWEEN t.value_to and t.value_from),0) as ref_tier,



IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.purchase_type = 'N' and  md.year=2018 and md.month=2),0) as cur_new_sales,

IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.purchase_type = 'R' and  md.year=2018 and md.month=2),0) as cur_resale,

IFNULL((select sum(md.end_user_amount)*1.5 from monthly_data md where md.id = p.id and md.purchase_type = 'N' and  md.year=2018 and md.month=2),0) as cur_new_sales_points,

IFNULL((select sum(md.end_user_amount)*0.7 from monthly_data md where md.id = p.id and md.purchase_type = 'R' and  md.year=2018 and md.month=2),0) as cur_resale_points,



IFNULL((select sum(md.end_user_amount) from monthly_data md where md.id = p.id and md.year=2018 and md.month = 2),0) as curr_total_sales,

IFNULL((select cur_new_sales_points+cur_resale_points),0) as cur_total_points,

IFNULL((select t.id from tier t where curr_total_sales BETWEEN t.value_to and t.value_from),0) as cur_tier,

IFNULL((select ((IF(cur_total_points=0,0,cur_total_points)/IF(ref_total_points=0,cur_total_points,ref_total_points)))*100),0) as growth





from partner p

where id = 2116

-->


<!--

SET @currNum1=0,@refNum1=0, @currNum2=0,@refNum2=0;

SELECT DISTINCT(temp.rowNum1), IFNULL(temp.cur_new_sale,'-') as cur_new_sale, IFNULL(temp.cur_resale,'-') as cur_resale, IFNULL(temp.cur_new_sales_points,'-') as cur_new_sales_points, IFNULL(temp.cur_resale_points,'-') as cur_resale_points, IFNULL(temp.ref_new_sale,'-') as ref_new_sale, IFNULL(temp.ref_resale,'-') as ref_resale, IFNULL(temp.ref_new_sales_points,'-') as ref_new_sales_points, IFNULL(temp.ref_resale_points,'-') as ref_resale_points

from (

(select curr1.*, ref1.*

from

(select @currNum1:=@currNum1+1 AS rowNum1,
IF(purchase_type='N',end_user_amount,'-') as cur_new_sale,
IF(purchase_type='R',end_user_amount,'-') as cur_resale,
IF(purchase_type='N',end_user_amount*1.5,'-') as cur_new_sales_points,
IF(purchase_type='R',end_user_amount*0.7,'-') as cur_resale_points

from monthly_data

where id = 2116
and year = 2018
and month = 3) as curr1

RIGHT OUTER JOIN

(select
 @refNum1:=@refNum1+1 AS rowNum2,
IF(purchase_type='N',end_user_amount,'-') as ref_new_sale,
IF(purchase_type='R',end_user_amount,'-') as ref_resale,
IF(purchase_type='N',end_user_amount*1.5,'-') as ref_new_sales_points,
IF(purchase_type='R',end_user_amount*0.7,'-') as ref_resale_points

from monthly_data

where id = 2116
and year = 2018
and month = 2) as ref1

on ref1.rowNum2 = curr1.rowNum1)


UNION ALL

(select curr2.*, ref2.*

from

(select @currNum2:=@currNum2+1 AS rowNum3,
IF(purchase_type='N',end_user_amount,'-') as cur_new_sale,
IF(purchase_type='R',end_user_amount,'-') as cur_resale,
IF(purchase_type='N',end_user_amount*1.5,'-') as cur_new_sales_points,
IF(purchase_type='R',end_user_amount*0.7,'-') as cur_resale_points

from monthly_data

where id = 2116
and year = 2018
and month = 3) as curr2

LEFT OUTER JOIN

(select
 @refNum2:=@refNum2+1 AS rowNum4,
IF(purchase_type='N',end_user_amount,'-') as ref_new_sale,
IF(purchase_type='R',end_user_amount,'-') as ref_resale,
IF(purchase_type='N',end_user_amount*1.5,'-') as ref_new_sales_points,
IF(purchase_type='R',end_user_amount*0.7,'-') as ref_resale_points

from monthly_data

where id = 2116
and year = 2018
and month = 2) as ref2

on ref2.rowNum4 = curr2.rowNum3)

) as temp
 -->











