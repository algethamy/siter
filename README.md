Step 1 - Open cmd window with "admin privileges"

Step 2 - to take ownership of contents of "hosts" file

     takeown /f  "C:\Windows\System32\drivers\etc\hosts"
     
     
Step 3 - to change permissions to "everyone" of contents of "hosts" file

     icacls "C:\Windows\System32\drivers\etc\hosts" /grant Everyone:F /t
     

Step 4 - open it in broweser 
    
    http://localhost/siter/
    
Step 5 - Enjoy :)