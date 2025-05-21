<style>
.pagination {
  display: inline-block;
  background-color: #fff;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd;

}

.pagination a.active {
  background-color: #6F1011;
  color: white;
  border: 1px solid #6F1011;

}

.pagination a:hover:not(.active) {background-color: #ddd;}

.pagination a:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.pagination a:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.error {color:red;}
</style>


 <!-- Section Banner -->

    <section class="banner">
      <div
        class="carousel carousel-animated carousel-animate-slide"
        <?php if($count_banner=="TRUE"){?>
          data-autoplay="false"
          data-interval="1200"
        <?php }?>
      >
        <div class="carousel-container">
       <?php foreach($banner as $row){?>  
          <div class="carousel-item has-background is-active">
            <img
              class="is-background"
              src="<?php echo base_url().'uploads/'.$row->img;?>"
              alt=""
              width="640"
              height="310"
            />
          </div>
        <?php }?> 
      <?php foreach($banner_all as $row){?>  
          <div class="carousel-item has-background">
            <img
              class="is-background"
              src="<?php echo base_url().'uploads/'.$row->img;?>"
              alt=""
              width="640"
              height="310"
            />
          </div>
        <?php }?>
        </div>
        <div class="carousel-navigation is-overlay">
          <div class="carousel-nav-left"><i class="fas fa-angle-left"></i></div>
          <div class="carousel-nav-right">
            <i class="fas fa-angle-right"></i>
          </div>
        </div>
      </div>
    </section>

<!-------------------------[product_list]-------------------------------------->


<?php if($this->input->get('page')=="product_list"){ ?>

<!--////////////////////////////////--แบ่งหน้า--///////////////////////////////////////////////-->
<br><br>
        <center>

          <div class="pagination" id="scroll">
            <?php  $count_page = ceil($count_all['count_all']/6);  //6 รายการต่อ 1 หน้า ?>
            <?php if($count_page!=0){?>
                <?php 
                  $next_page = $this->input->get('pageshow')+1;
                  $next_offset = $this->input->get('offset')+1;

                  $prev_page = $this->input->get('pageshow')-1;
                  $prev_offset = $this->input->get('offset')-1;
                ?>

                <?php if(!empty($this->input->get('pageshow')) AND $this->input->get('pageshow')==""){?>
                  <?php  if($this->input->get('pageshow') != $count_page){?>
                      <a class="pagination-next" href="<?php echo base_url('product?page=product_list&&cate_id='.$this->input->get('cate_id').'&&product_id='.$this->input->get('product_id').'&&pageshow='.$next_page.'&&offset='.$next_offset.'');?>#scroll"><?php if($this->lang->line("set_lang")=="th"){echo "ถัดไป";}else{echo "Next";}?></a>
                  <?php }?>
                <?php }?>
  
              
              <?php  for( $i= 1 ; $i <= $count_page; $i++ ){?>   

                <?php 
                  $count_2 = $i-1;
                  $offset = $count_2*6; //6 รายการต่อ 1 หน้า

      
                ?>

              <a <?php if($i==$this->input->get('pageshow')){echo 'class="active"';}?>
              href="<?php echo base_url('product?page=product_list&&cate_id='.$this->input->get('cate_id').'&&product_id='.$this->input->get('product_id').'&&pageshow='.$i.'&&offset='.$offset.'');?>#scroll">
                <?php echo $i;?>  
              </a>
              <?php } ?>

                 <?php if(!empty($this->input->get('pageshow')) AND $this->input->get('pageshow')==""){?>
                 
                  <?php  if($this->input->get('pageshow') != 1){?>
                      <a class="pagination-previous" href="<?php echo base_url('product?page=product_list&&cate_id='.$this->input->get('cate_id').'&&product_id='.$this->input->get('product_id').'&&pageshow='.$prev_page.'&&offset='.$prev_offset.'');?>#scroll"><?php if($this->lang->line("set_lang")=="th"){echo "ย้อนกลับ";}else{echo "Previous";}?></a>
                  <?php }?>
                <?php }?>
      


            <?php } ?>
          </div>

        </center>

        <br><br>

<!--////////////////////////////////--end แบ่งหน้า--///////////////////////////////////////////////-->
  
   

    <ul>
    	<?php foreach($product_cate as $row){?>
    	<li style="display:inline;"><a href="<?php echo base_url('product?page=product_list&&cate_id='.$row->cate_id.'&&pageshow='.'1'.'&&offset='.'0'.'');?>#scroll"><?php echo $row->name_th;?></a></li>
    	<?php }?>
    </ul>

    <ul>
      <?php foreach($product as $row){?>
      <li style="display:inline;"><a href="<?php echo base_url('product?page=product_list&&cate_id='.$row->cate_id.'&&product_id='.$row->product_id.'&&pageshow='.$this->input->get('pageshow').'&&offset='.$this->input->get('offset').'');?>#scroll"><?php echo $row->name_th;?></a></li>
      <?php }?>
    </ul>

    <?php foreach($product_stock as $row){?>
    <a href="<?php echo base_url('product?page=product_view&&stock_id='.$row->stock_id.'');?>#scroll">
      <div style="border: 1px solid #ccc;width:600px;margin: auto;text-align: center;">
        <?php if($row->img==""){
                echo "<img  width=100px src=".base_url()."backend/images/noimage100.gif>";
          }else{
              echo "<img  width=100px src=".base_url().'uploads/'.$row->img.">";
        }?>
        <p>หมวดหมู่ : <?php echo $row->name_th1;?></p>
        <p>สินค้า : <?php echo $row->name_th2;?></p>
        <p>สต๊อก : <?php echo $row->name_th;?></p>
        <p>รายละเอียด : <?php echo nl2br($row->description_th);?></p>
        <p>ราคาต่อชิ้น : <?php echo $row->price.' บาท';?></p>
        <p><?php if($row->amount_min<=5){echo "<p style='color:red;'>OUT OF STOCK</p>";}?></p>
      </div>
    </a>
    <?php }?>

   
  

<!--////////////////////////////////--แบ่งหน้า--///////////////////////////////////////////////-->

        <center>
         
        
          <div class="pagination">
            <?php  $count_page = ceil($count_all['count_all']/6);  //6 รายการต่อ 1 หน้า ?>
            <?php if($count_page!=0){?>
                <?php 
                  $next_page = $this->input->get('pageshow')+1;
                  $next_offset = $this->input->get('offset')+1;

                  $prev_page = $this->input->get('pageshow')-1;
                  $prev_offset = $this->input->get('offset')-1;
                ?>

                <?php if(!empty($this->input->get('pageshow')) AND $this->input->get('pageshow')==""){?>
                  <?php  if($this->input->get('pageshow') != $count_page){?>
                      <a class="pagination-next" href="<?php echo base_url('product?page=product_list&&cate_id='.$this->input->get('cate_id').'&&product_id='.$this->input->get('product_id').'&&pageshow='.$next_page.'&&offset='.$next_offset.'');?>#scroll"><?php if($this->lang->line("set_lang")=="th"){echo "ถัดไป";}else{echo "Next";}?></a>
                  <?php }?>
                <?php }?>
  
              
              <?php  for( $i= 1 ; $i <= $count_page; $i++ ){?>   

                <?php 
                  $count_2 = $i-1;
                  $offset = $count_2*6; //6 รายการต่อ 1 หน้า

      
                ?>

              <a <?php if($i==$this->input->get('pageshow')){echo 'class="active"';}?>
              href="<?php echo base_url('product?page=product_list&&cate_id='.$this->input->get('cate_id').'&&product_id='.$this->input->get('product_id').'&&pageshow='.$i.'&&offset='.$offset.'');?>#scroll">
                <?php echo $i;?>  
              </a>
              <?php } ?>

                 <?php if(!empty($this->input->get('pageshow')) AND $this->input->get('pageshow')==""){?>
                 
                  <?php  if($this->input->get('pageshow') != 1){?>
                      <a class="pagination-previous" href="<?php echo base_url('product?page=product_list&&cate_id='.$this->input->get('cate_id').'&&product_id='.$this->input->get('product_id').'&&pageshow='.$prev_page.'&&offset='.$prev_offset.'');?>#scroll"><?php if($this->lang->line("set_lang")=="th"){echo "ย้อนกลับ";}else{echo "Previous";}?></a>
                  <?php }?>
                <?php }?>
  


            <?php } ?>
          </div>

        </center>

        <br><br>

<!--////////////////////////////////--end แบ่งหน้า--///////////////////////////////////////////////-->

<?php } ?>


<!-------------------------[product_view]-------------------------------------->

<?php if($this->input->get('page')=="product_view"){ ?>

  <table>
    <thead>
      <tr>
        <th>หมวดหมู่ :</th>
        <th>ชื่อสินค้า :</th>
        <th>สต๊อกสินค้า :</th>
        <th>รายละเอียดสินค้า :</th>
        <th>ราคาสินค้าต่อชิ้น(บาท) :</th>
        <th>จำนวนสินค้าที่ต้องการ(ชิ้น) :</th>
      </tr>
    </thead>
     <tbody>
      <form action="<?php echo base_url('product?page=product_view&&stock_id='.$this->input->get('stock_id').'');?>" method="post">
       <tr>
         <td><?php echo $product_stock_view['name_th1'];?></td>
         <td><?php echo $product_stock_view['name_th2'];?></td>
         <td><?php echo $product_stock_view['name_th'];?></td>
         <td><?php echo nl2br($product_stock_view['description_th2']);?></td>
         <td><?php echo $product_stock_view['price'];?></td>
         <td>

          <input type="hidden" name="cate_id" value="<?php echo $product_stock_view['cate_id'];?>">
          <input type="hidden" name="product_id" value="<?php echo $product_stock_view['product_id'];?>">
          <input type="hidden" name="stock_id" value="<?php echo $this->input->get('stock_id');?>">
          <input type="hidden" name="mem_id" value="<?php echo $mem_id;?>">
          <input type="hidden" name="price" value="<?php echo $product_stock_view['price'];?>">
          
          <?php if($product_stock_view['amount']<=5){?>
            <?php echo "<p style='color:red;'>OUT OF STOCK</p>";?>
          <?php }else{?>
            <input type="number" name="amount" value="" placeholder="ใส่จำนวน" min="1" max="<?php echo $product_stock_view['amount'];?>" step="any" onkeypress="return event.charCode >= 48">
            <?php echo form_error('amount', '<div class="error" style="padding: 1% 0%;">', '</div>'); ?>
            <input type="submit" name="submit" value="หยิบใส่ตะกร้า">

          <?php }?>
         </td>
       </tr>
       </form>
     </tbody>
  </table>




<?php }?>


<!-------------------------[add_to_cart]-------------------------------------->

<?php if($this->input->get('page')=="add_to_cart"){ ?>

  <center id="scroll"><h3>- ตะกร้าสินค้า -</h3><br><br>
  <form action="<?php echo base_url('product?page=add_to_cart');?>#scroll" method="post">
  <table>
    <thead>
      <tr>
        <th>รูปภาพสินค้า</th>
        <th>หมวดหมู่ :</th>
        <th>ชื่อสินค้า :</th>
        <th>สต๊อกสินค้า :</th>
        <th>จำนวน :</th>
        <th>ราคา/หน่วย :</th>
        <th>ราคารวม :</th>
        <th>จัดการ</th>
      </tr>
    </thead>
     <tbody>
      
        <?php foreach($product_order AS $row){?>
       <tr>
         <td>
          <a href="<?php echo base_url('product?page=product_view&&stock_id='.$row->stock_id.'');?>" >
          <?php if($row->img2==""){
                echo "<img  width=50px src=".base_url()."backend/images/noimage100.gif>";
          }else{
              echo "<img  width=50px src=".base_url().'uploads/'.$row->img2.">";
          }?>
         </td>
         <td><?php echo $row->name_th_top;?></td>
         <td><?php echo $row->name_th;?></td>
         <td><?php echo $row->name_th2;?></td>

         <td>
          <input type="number" value="<?php echo @number_format($row->amount);?>" name="amount[]"  min="1" max="<?php echo $row->amount_min2;?>" step="any" onkeypress="return event.charCode >= 48">
          <input type="hidden" value="<?php echo $row->order_id;?>" name="order_id[]">
        </td>
        <td><?php echo @number_format($row->price);?></td>
         <td><?php echo @number_format(($row->price*$row->amount));?></td>
         <td><a href="<?php echo base_url('product?page=product_order_delete&&order_id='.$row->order_id.''); ?>" class="button is-orange">ลบ</a></td>
        
       </tr>
       <?php }?>
     </tbody>
  </table>
    รวมจำนวนสินค้า : <?php echo number_format($product_order_sum['sum_amount']).' ชิ้น';?>
    <input type="hidden" name="sum_amount" value="<?php echo $product_order_sum['sum_amount'];?>">
    <br><br>

    รวมจำนวนเงินที่ต้องชำระ : <?php echo number_format($product_order_sum['sum_all']).' บาท';?>
    <input type="hidden" name="sum_all" value="<?php echo $product_order_sum['sum_all'];?>">
    <br><br>

    <input type="submit" name="submit_cal" class="button is-orange" value="คำนวนเงิน">
    <input type="submit" name="submit_save" class="button is-orange" value="ดำเนินการชำระเงิน">

  </form>
  </center>



<?php }?>



<!-------------------------[view_to_cart]-------------------------------------->

<?php if($this->input->get('page')=="view_to_cart"){ ?>

  <center id="scroll_payment"><h3>- สรุปข้อมูลคำสั่งซื้อ -</h3><br><br>

  <form action="<?php echo base_url('product?page=view_to_cart');?>" method="post">
    <table>
      <thead>
        <tr>
          <th>รูปภาพสินค้า</th>
          <th>หมวดหมู่ :</th>
          <th>ชื่อสินค้า :</th>
          <th>สต๊อกสินค้า :</th>
          <th>จำนวน :</th>
          <th>ราคา/หน่วย :</th>
          <th>ราคารวม :</th>
          <th>จัดการ</th>
        </tr>
      </thead>
       <tbody>
        
        <?php foreach($product_order AS $row){?>
         <tr>
           <td>
            <a href="<?php echo base_url('product?page=product_view&&stock_id='.$row->stock_id.'');?>" >
            <?php if($row->img2==""){
                  echo "<img  width=50px src=".base_url()."backend/images/noimage100.gif>";
            }else{
                echo "<img  width=50px src=".base_url().'uploads/'.$row->img2.">";
            }?>
           </td>
           <td><?php echo $row->name_th_top;?></td>
           <td><?php echo $row->name_th;?></td>
           <td><?php echo $row->name_th2;?></td>

           <td>
            <?php echo @number_format($row->amount);?>
            <input type="hidden" value="<?php echo $row->order_id;?>" name="order_id[]">
          </td>
          <td><?php echo $row->price;?></td>
           <td><?php echo @number_format(($row->price*$row->amount));?></td>
           <td><a href="<?php echo base_url('product?page=product_order_delete&&order_id='.$row->order_id.''); ?>" class="button is-orange">ลบ</a></td>
          
         </tr>
         <?php }?>

       </tbody>
    </table>

    รวมจำนวนสินค้า : <?php echo number_format($product_order_sum['sum_amount']).' ชิ้น';?>
    <input type="hidden" name="sum_amount" value="<?php echo $product_order_sum['sum_amount'];?>">
    <br><br>

    รวมจำนวนเงินที่ต้องชำระ : <?php echo number_format($product_order_sum['sum_all']).' บาท';?>
    <input type="hidden" name="sum_all" value="<?php echo $product_order_sum['sum_all'];?>">
    <br><br>

    <input type="submit" name="submit" class="button is-orange" value="สั่งซื้อ">

  </form>

  <br><br>

  <center id="scroll_payment"><h3>- ที่อยู่ในการจัดส่ง/ใบกำกับภาษี -</h3><br><br>

    <p><?php echo $product_order_view['firstname'].' '.$product_order_view['lastname'];?></p>
    <p>เบอร์โทร : <?php echo $product_order_view['tel'];?></p>
    <p>อีเมล : <?php echo $product_order_view['email'];?></p>
    <p>ที่อยู่ : บ้านเลขที่ <?php echo $product_order_view['add_no'];?>
                 หมู่ที่ <?php echo $product_order_view['moo'];?>
                 ตำบล/เขต <?php echo $product_order_view['district'];?>
                 อำเภอ/แขวง <?php echo $product_order_view['amphur'];?>
                 จังหวัด <?php echo $product_order_view['province'];?>
                 รหัสไปรษณีย์ <?php echo $product_order_view['zipcode'];?>
  </center>
<?php }?>


<!-------------------------[select_to_payment]-------------------------------------->

<?php if($this->input->get('page')=="select_to_payment"){ ?>

  <center id="scroll_payment"><h3>- กรุณาเลือกวิธีการชำระเงิน -</h3><br><br>
  <a href="<?php echo base_url('product?page=select_to_payment&&payment_by=1#scroll_payment');?>">ชำระผ่านธนาคาร</a>
  <a href="<?php echo base_url('product?page=select_to_payment&&payment_by=2#scroll_payment');?>">บัตรเครดิต</a>
  <a href="<?php echo base_url('product?page=select_to_payment&&payment_by=3#scroll_payment');?>">Paypal</a>

  <?php if($this->input->get('payment_by')==1){?>

    <br><br>
    <p>ทำการโอนเงินตามหมายเลขบัญชี -> แนบไฟล์การชำระเงิน -> รอผู้ดูแลระบบอนุมัติการชำระเงิน -> รอรับสินค้า</p>
    <br>
    <p>สามารถชำระเงินตามหมายเลขบัญชีด้านล่าง</p>
    <p>บัญชีธนาคารกรุงไทย 0000-0000-0000</p>
    <p>บัญชีธนาคารกรุงเทพ 0000-0000-0000</p>
    <p>บัญชีธนาคารออมสิน 0000-0000-0000</p>

    <form action="<?php echo base_url('product?page=save_to_payment');?>" method="POST">
      <input type="submit" name="" class="button is-orange" value="ยืนยันการสั่งซื้อ">
    </form>

  <?php }?>

  <?php if($this->input->get('payment_by')==2){?>
  <?php }?>

  <?php if($this->input->get('payment_by')==3){?>
  <?php }?>

<?php }?>


<!-------------------------[save_to_payment]-------------------------------------->

<?php if($this->input->get('page')=="save_to_payment"){ ?>
  <center id="scroll_payment"><h3>- จ่ายเงินสำเร็จรอผู้ดูแลระบบตรวจสอบ -</h3><br><br>
  <a href="<?php echo base_url('product?page=product_list&&pageshow=1&&offset=0');?>">ซื้อสินค้าต่อ</a>
<?php }?>



<!---------------------------------------------------------------------------------------->

<?php 
if($this->input->get('page')=="product_view"){
  $_SESSION['page'] = "product?page=add_to_cart";
}
?>

<script type="text/javascript">
$(document).ready(function() {
    $('a[href*=\\#]').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop : $(this.hash).offset().top
        }, 500);
    });
});
</script>
  
