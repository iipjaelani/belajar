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
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-dark">
                    <tr>
           
                      <th>No</th>
                      <th>Member Name</th>
                      <th>Member status</th>
                      <th>Member active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-dark">
                  
                 
                    <tr>               
                      <th>Jumlah Member</th>
                      <th><?= $jumlah; ?></th>
                      <th>-</th>
                      <th>-</th>
                      <th>-</th>
                    </tr>
             
                  </tfoot>
                  <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($memberRole as $m) : ?>
                  
                    <tr>
                      <td class="text-center"><?= $i; ?></td>
                      <td class="text-left"><?= $m['name']; ?></td>
                      <td class="text-left"><?= $m['menu']; ?></td>  
                      <td class="text-left"><?= $m['is_active']; ?></td>
                      <td class="text-center">
                          <a href="<?= base_url('admin/detail/'). $m['id']; ?>" class="badge badge-primary">Detail</a>
                          <a href="" class="badge badge-danger">Delet</a>
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