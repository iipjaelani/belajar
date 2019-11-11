        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    

 
     
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
             <?php $i = 1 ?>
            <?php foreach($aritmatika as $a) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $a['menu_name']; ?></td>               
                      <td>
                        <a href="" class="btn btn-primary">Go!!</a>
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