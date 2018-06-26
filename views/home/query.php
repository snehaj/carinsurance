<div class="container" style="margin-top: 50px">
    <h2>Database Task</h2>
    
    
     <div class="alert alert-info">
         <p>Link To Database Structure: <a href="<?php echo $dblink?>" download>Employee Tables</a></p>
     </div>
     <div class="bg-success">
         <p>Query To get 1-person data in all languages: 
             <br>
             SELECT e.*,lang.name,et.language_code as language,et.introduction,et.experience,et.education 
             FROM `employee` e  
             JOIN employee_translation et ON e.id =et.employee_id 
             JOIN language as lang ON et.language_code=lang.code
             WHERE e.id={$id}
         
         </p>
     </div>

</div>
