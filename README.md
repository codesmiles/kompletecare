# Kompletecare Interview Test

## Requirements

- Have docker desktop installed on your pc and in the root directory type ```sh docker-compose up```
- seed data to the database in the project root directory -> ```sh sail artisan db:seed```
- you have errors using sail shorten sail command in the project root directory of the project (in case sail refuse to work) -> ```sh alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'```
- You can authenticate a User through the terminal  ```sh sail artisan app:authenticate-user``` or using the authenticate user endpoint ```sh http://0.0.0.0:80/api/authenticate_user```
- environment variables need to be provided by an email provider example mailtrap was used as a mailing platform for this project

## Deliverables

Implementation criteria [CLICK HERE](/SEVENZ%20HEALTHCARE%20BACKEND%20DEVELOPER%20TEST.pdf)

### Enviroment Variables

- MAIL_MAILER
- MAIL_HOST
- MAIL_PORT
- MAIL_USERNAME
- MAIL_PASSWORD
- MAIL_ENCRYPTION
- MAIL_FROM_ADDRESS
- MAIL_FROM_NAME

### API Endpoints

- Base URL -> <http://0.0.0.0:80/api>
- GET -> Lab test </user/laboratory_test>
- POST -> lab test </user/laboratory_test>

## TASKS

- provide the auth token for use by the frontend developer✅
- post request of the lab-test to the database✅
- mailing service to <peopleoperations@kompletecare.com>✅
- Mail should include My name at the footer of the submission mail✅
- Endpoint will have an authentication for only authenticated users can access this endpoints✅
- Postman JSON Payload ->**[CLICK HERE](/payload.json)**✅

 send the link to this submisstion to <peopleoperations@kompletecare.com>
 Submission is by email to <peopleoperations@kompletecare.com>. 
 Specify the endpoints and the bearer auth token to be used for testing in your submission.
