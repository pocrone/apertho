<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Content Row -->
 <?php if ($count!=0):?>
       <form action="<?=base_url()?>home/cari/<?=$kategori?>" method="post">
        <div class="form-group row">
        <a href="<?=base_url()?>" class="btn text-dark p-1 mx-1"><i class="fas fa-chevron-left"></i></a> 
            <input type="text" class="form-control form-control-user search text-center" style="width:80%" placeholder="Cari <?=strtolower($title)?>..."
                name="cari" required="">
            <button type="submit"  class="sml bg-warning text-dark btn-search" style="width:10%"><i class="fa fa-search"></i></button>
            
        </div>
        
         <div class="text-left"><a href="<?=base_url()?>tambah" class="btn btn-warning text-dark  sml mb-1 mt-1 "><i class="fas fa-plus mr-1"></i>Tambah Arsip</a></div>
    </form>
        <?php endif;?>
  
    <div class="row">
     
        <?php foreach($arsip as $row):?>
        <div class="col-xl-6 col-md-6 mb-2">
            <div class="card  ">
                <div class="card-body row">
                    <div class="w-20 mx-2 text-center">
                        <i class="fas fa-file-alt text-warning xxx-large"></i>
                    </div>
                    <div class="w-70">
                        <div class="text-dark small"><?=$row->nama_arsip?></div>
                        <?php if($row->ext=='.jpg' || $row->ext=='.jpeg' || $row->ext=='.png'):?>
                        <a class="small mr-2" href="<?=base_url()?>home/lihat/<?=$row->id_arsip?>">Lihat</a>
                        <?php endif;?>
                        <a class="small mr-2" href="<?=base_url()?>home/push_file/<?=$row->id_arsip?>">Download</a>
                        <a class="small mr-2" href="<?=base_url()?>home/edit/<?=$row->id_arsip?>">Edit</a>
                        <a class="small" href="<?=base_url()?>home/hapus/<?=$row->id_arsip?>">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <?php if($count==0):?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="mb-5 text-dark font-weight-bold">Belum Ada Arsip</h5>
                    <img src="<?=base_url()?>assets/img/undraw_empty.svg" alt="" width="200px"><br>
                     <a href="<?=base_url()?>tambah" class="btn btn-dark text-white mt-3 sml"><i class="fas fa-plus mr-1"></i>Tambah Arsip</a>
                </div>
            </div>
        </div>
        <?php endif;?>
        
    </div>
</div>
<!-- /.container-fluid -->