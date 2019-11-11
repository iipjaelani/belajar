

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
         
          </div>
    
    
      <?= form_error('title', '<div class="alert alert-danger mb-3" role="alert">', '</div>'); ?>
       <?= form_error('subjek', '<div class="alert alert-danger mb-3" role="alert">', '</div>'); ?>
        <?= form_error('pesan', '<div class="alert alert-danger mb-3" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
 
 
    
    
    
          <p>         
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="collapseExample">
              Tambah News
            </button>
          </p>
          <div class="collapse" id="menu">
            <div class="card card-body">
            
               <form action="<?= base_url('admin/news'); ?>" method="post">
  
                	 <div class="form-group">
			  
                			  	<label for="title">Masukan Title berita</label>
                				 	<input type="text" class="form-control" id="title" name="title"  placeholder="Masukan Title" />
                				 	<label for="subjek">Masukan subjek berita</label>
                				 	<input type="text" class="form-control" id="subjek" name="subjek"  placeholder="Masukan Title" />
                      <label for="pesan">Masukan isi berita</label>
                			  	<textarea class="form-control" rows="10" id="pesan" name="pesan" placeholder="Masukan pesan"></textarea>
                  
                   </div>
   
                    <button type="submit" class="btn btn-primary">Add</button>      
              
              
                </div>   
               </div>          
              </form>
        
        
 
 
           <?php foreach($news as $n) : ?>
    
              <div class="card shadow mt-3 mb-4">
         
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $n ['title']; ?></h6>
                </a>
             
                <div class="collapse" id="collapseCardExample">
           
                  <div class="card-body">
                   <h4><?= $n['subjek']; ?></h4>
                   <hr>
                   <?= $n['news']; ?>
                  </div>
                </div>
              </div>
             
             <?php endforeach; ?> 
              
   

  
 
 
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->