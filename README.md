# my-gym

> To run the application you need to  install dependances ( frontend & backend)
> Make sure you have mysql up and running and import the attached db.sql file

# cd back-end
# composer install 
# php -S 127.0.0.1:80

# cd front-end
# npm install
# npm run dev         

Goto to check frontend app  http://localhost:8080


> System design

Many2Many relationships, we use another table.
( Plan & Day) Many2Many 
( Day & Exercise) Many2Many
( User & Plan) Many2Many


### Note 

- OOP  and abstraction
- Data modeling in both backend and frontend
- Security input validation 
- well-structured ( MVP, Business-oriented)
- No framework but selective libraries.
- Easy to reuse, to maintain,  
- Service-client architecture pattern ( REST Api)
- Using vue js for the frontend components and routes | using Jquery for Ajax requests.


###  Somethings could be improved

- Frontend for sure needs to be enhanced a lot and have UX/UI version.
- Create a user on a mail server and make it actual sending    
- I tried to mock it cause it needs some real user credentials to be able to send email using 


- Also, it's nice to have a queue system for sending emails.
- And to have integration testing
- And add some documents using PhpDocs

(swiftmailer) is used for sending emails.
(monolog) no being used yet by nice to have logs for each important action.
 
 

 


