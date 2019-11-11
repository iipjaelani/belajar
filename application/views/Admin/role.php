        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
       <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
 
 
 
 
          <p>         
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="collapseExample">
              Tambah role baru
            </button>
          </p>
          <div class="collapse" id="menu">
            <div class="card card-body">
            
               <form action="<?= base_url('admin/role'); ?>" method="post">
  
                  <div class="form-group">                                  
                    <label for="menu">Nama menu</label>
                    <input type="text" class="form-control mb-4" id="role" name="role" placeholder="Nama menu">    
                    
                 <div>
                    <button type="submit" class="btn btn-primary">Add</button>      
                </div>   
               </div>          
              </form>
             </div>
            </div>
        

 

 
 
 
 
    
 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables <?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
           
                      <th>No</th>
                      <th>Menu Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>               
                      <th>-</th>
                      <th>-</th>
                      <th>-</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($role as $m) : ?>
                    <tr>
                      <td><?= $m['id']; ?></td>
                      <td><?= $m['role']; ?></td>
                      <td>
                          <a href="<?= base_url('admin/roleaccess/') . $m['id']; ?>" class="badge badge-warning">acccess</a>
                          <a href="" class="badge badge-primary">Edit</a>
                          <a href="" class="badge badge-danger">Delet</a>
                      </td>
              
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->