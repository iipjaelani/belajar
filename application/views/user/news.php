

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

    
    
    <div class="row">
  
  <div class="col-sm-12">
  
  <h3 class='text-center'>Notification For</h3>
    <hr>
    <div class="row">
      
      <div class="col-sm-4">
      
      <h5> For a </h5>
    
        <?php foreach($news as $n) : ?>
    
              <div class="card shadow mt-3 mb-4"">
         
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
          
      
    </div>
    
  </div>
  
  
</div>

   
         
         
         
         
           
    
    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->