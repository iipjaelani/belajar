        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
       <?= form_error('bug', '<div class="alert alert-danger mb-3" role="alert">', '</div>'); ?>
   
        <?= $this->session->flashdata('message'); ?>
 
 
 
 
          <p>         
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#chat" aria-expanded="false" aria-controls="collapseExample">
              Chat Admin <i class="fas fa-fw fa-comment"></i>
            </button>
          </p>
          <div class="collapse" id="chat">
            <div class="card card-body">
            
               <form action="<?= base_url('menu'); ?>" method="post">
  
                  <div class="form-group">                                  
                    <label for="chat">Nama menu</label>
                    <input type="text" class="form-control mb-4" id="chat" name="chat" placeholder="Nama menu">    
                    
                 <div>
                    <button type="submit" class="btn btn-primary">Add</button>      
                </div>   
               </div>          
              </form>
             </div>
            </div>
        

 
          <p>         
            <button class="btn btn-primary mt-2" type="button" data-toggle="collapse" data-target="#bug" aria-expanded="false" aria-controls="collapseExample">
              Report Bug <i class="fa fa-fw fa-bug"></i>
            </button>
          </p>
          <div class="collapse show" id="bug">
            <div class="card card-body">
            
               <form action="<?= base_url('user/chat'); ?>" method="post">
  
                  <div class="form-group">
                     <select name="type" id="type" class="form-control">
                            <option>Select Type Bug</option>
                                <?php foreach ($bugId as $b) : ?>
                                  <option value="<?= $b['id']; ?>" ><?= $b['bug_name']; ?></option>
                                 
                                <?php endforeach; ?>
              
                       </select>
                                                
                        <label class="mt-2" for="bug">Explicated the Bug</label>
                        <textarea class="form-control mb-4" id="bug" name="bug" placeholder="Jelaskan semua bug yang ada alami" rows="10"></textarea>   
                     </div>  
                     
                 <div>
                    <button type="submit" class="btn btn-primary mt-4">Send Report</button>      
                </div>   
                </div>
               </div>          
              </form>
             </div>
            </div>
        

 
 
 
 
    
 
  
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->