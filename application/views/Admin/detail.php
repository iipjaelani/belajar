

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
         
         <!-- form vakidation tampilan error --> 
           <?= $this->session->flashdata('message'); ?>
          <!-- end form vakidation --> 
    
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-12">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="col-md-4">
                    <img class="float-left mr-10" src="<?= base_url('assets/img/profile/'). $user['image']; ?>" style="width:100px; height:100px;">           
                  </div>
                  <div class="row ml-4">
                   <div class="col-md-auto">
                      <h4><?= $user['name']; ?></h4>
                      <p><?= $user['email']; ?>
                      <p>Mendaftar pada tanggal : <?= date('d F Y', $user['date_created']); ?>
                    </div>
                   </div>
               </div>
              </div>
            </div>


   
        

         </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->