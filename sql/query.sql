SELECT e.*,lang.name,et.language_code as language,et.introduction,et.experience,et.education 
FROM `employee` e  
JOIN employee_translation et ON e.id =et.employee_id 
JOIN language as lang ON et.language_code=lang.code
WHERE e.id={$id}