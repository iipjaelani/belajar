        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
       <?= form_error('title', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
 
 
 
 
          <p>         
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="collapseExample">
              Tambah Menu mbaru
            </button>
          </p>
          <div class="collapse" id="menu">
            <div class="card card-body">
            
               <form action="<?= base_url('menu/submenu'); ?>" method="post">
  
                  <div class="form-group">
                      <input type="text" class="form-control" id="title" name="title" placeholder="Add Title">
                    </div>
                      <div class="form-group">
              
                        <select name="menu_id" id="menu_id" class="form-control">
                          <option value="">Select Menu</option>
                          <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                          <?php endforeach; ?>
              
                        </select>
                    </div>
                       <div class="form-group">
                      <input type="text" class="form-control" id="url" name="url" placeholder="Add url">
                    </div>
                       <div class="form-group">
                      <input type="text" class="form-control" id="icon" name="icon" placeholder="Add icon">
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                        <label class="form-check-label" for="is_active">
                          Active or No ?
                        </label>
                      </div>
                    </div>
                                 <button type="submit" class="btn btn-primary">Add</button>      
     
    
               </div>          
              </form>
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
           
                     
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Menu</th>
                    <th scope="col">url</th>
                    <th scope="col">icon</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>               
                      <th>-</th>
                      <th>-</th>
                      <th>-</th>
                      <th>-</th>
                      <th>-</th>
                      <th>-</th>
                      <th>-</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $i = 1 ?>
              <?php foreach ($subMenu as $sm) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $sm['title']; ?></td>
                    <td><?= $sm['menu']; ?></td>
                    <td><?= $sm['url']; ?></td>
                    <td><?= $sm['icon']; ?></td>
                    <td><?= $sm['is_active']; ?></td>
                    <td>

                      <a href="" class="badge badge-primary">Edit</a>
                      <a href="<?= base_url('admin/delet'); ?>" class="badge badge-danger">Delet</a>

                    </td>
                </tr>
              <?php $i++; ?>
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
      
      
      
  