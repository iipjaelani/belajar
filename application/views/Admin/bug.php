        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
 
        
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
 
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Menu <?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
          <!- isi ->
          
      <?php foreach($bugReport as $b) : ?>
           <div class="card shadow mb-4">
           
            <div class="card-header py-3">
             
                   
             
            <?php if ($b['bug_name'] == 'Berbahaya') : ?>
             <div class="card-header bg-danger py-3">
              <a href="<?= base_url() ?>admin/hapus/<?= $b['id']; ?>" class="float-right"><i class="fa fa-window-close text-light"></i></a>
              
                
              <h6 class="m-0 font-weight-bold text-light">type Bug <?= $b['bug_name']; ?></h6>
           
            </div>
            
            <?php elseif ($b['bug_name'] == 'Biasa') : ?>
            <div class="card-header bg-success py-3">
             <a href="<?= base_url() ?>admin/hapus/<?= $b['id']; ?>" class="float-right"><i class="fa fa-window-close text-light"></i></a>
                 
              <h6 class="m-0 font-weight-bold text-light">type Bug <?= $b['bug_name']; ?></h6>
            </div>
            
            <?php elseif ($b['bug_name'] == 'Menengah') : ?>
             <div class="card-header bg-warning py-3">
              <a href="<?= base_url() ?>admin/hapus/<?= $b['id']; ?>" class="float-right"><i class="fa fa-window-close text-light"></i></a>
                 
              <h6 class="m-0 font-weight-bold text-light">type Bug <?= $b['bug_name']; ?></h6>
            </div>
            <?php endif; ?>
             <p class="mt-2 mb-0">Report on : <?= date('d F', $user['date_created']); ?></p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
          
              <p><?= $b['bug']; ?>
          
           </div>
         
            </div>
            
          </div>
        <?php endforeach; ?>

          <!- end isi ->
          
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->