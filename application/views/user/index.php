

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

    
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-12">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="container">
                    <div class="row">
                    <div class="col-sm-12">
                    
                      <div class="row">
                      <div class="col-sm-4">
             
                    <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" class="img-thumbnail">           
                  </div>
                  <div class="row mt-4">
                  <div class="col-sm-auto">
                    <h4 class="mb-0"><strong><?= $user['name']; ?></strong></h4>
                    <p><strong><?= $user['email']; ?></strong></p>
                    <p>Anda mendaftar pada tanggal : <?= date('d F Y', $user['date_created']); ?>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div> 
                   <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                   <?= $this->session->flashdata('message'); ?>
 
                  </div>
                    <p>         
                      <button class="btn btn-primary mt-4 ml-4" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="collapseExample">
                        Edit My Profile
                      </button>
                    </p>
                    <div class="collapse" id="menu">
                      <div class="card card-body bg-dark">
                      <div class="container">
                      <div class="row">
                      <div class="col-sm-12">
                      
                        <div class="row">
                        <div class="col-sm-4 mb-4">
                          		<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" />
          
                        </div>
                      
                        
              <div class="col-sm-8 float-right">
                   <?= form_open_multipart('user/edit'); ?>
                  <div class="form-group">                                  
                
                    <input type="text" class="form-control mb-4" id="name" name="name" value="<?= $user['name']; ?>">    
                    <input type="text" class="form-control mb-4" id="email" name="email" value="<?= $user['email']; ?>" readonly>    
               
                 <div>
                 <div class="custom-file">
        									<input type="file" class="custom-file-input" id="image" name="image" />
        
        									<label class="custom-file-label" for="image">Choose file</label>
        								</div>
        						
                    <button type="submit" class="btn btn-primary mt-3 float-right">Save</button>      
                </div>   
                  </div>
              </div>
               
              </form>
                </div>
              </div>
             </div>
               </div>
             
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