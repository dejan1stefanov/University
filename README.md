The college API is a demo API for an university software, where sotres information about all the employees, professors, students, projects.

First you need to register in the users table.
Then with the email and password you need to generate a token.
Send the email and password to this API route to generate a token:

<http://domain>/login 
method: POST,
header {
    "Accept": "aplication/json",
    "Content-Type": "aplication/json" 
}
body {
    "email": "exemple@gmail.com",
    "password": "1234"
}

GET API routes:
    <http://domain>/people
    <http://domain>/people/{person}
     <http://domain>/students
     <http://domain>/students/{student}
     <http://domain>/alumnis
     <http://domain>/alumnis/{alumni}
     <http://domain>/majors
     <http://domain>/majors/{major}
     <http://domain>/positions
     <http://domain>/subjects
     <http://domain>/employees
     <http://domain>/employees/general
      <http://domain>/employees/research_assistants
       <http://domain>/employees/teaching_assistants
    
    POST API routes:
    header {
        "Accept": "aplication/json",
        "Content-Type": "aplication/json",
        "Authorization": "Bearer <Token>" 
    }
        - Students 
        <http://domain>/students
        body {
            'first_name'
            'last_name'
            'social_number'
            'adress'
            'gender'
            'date_of_birth'
            'index_number'
            'major_id'
        }

        - Alumnis
        <http://domain>/alumnis
        body {
            'first_name'
            'last_name'
            'social_number'
            'adress'
            'gender'
            'date_of_birth'
            'field_of_graduation'
            'date_of_graduation'
            'diploma_type'
        }

        - Positions
        <http://domain>/positions
        body {
             'position_name'
        }

        - Employees general
        <http://domain>/employees/general

       - Professors 
        <http://domain>/employees/professors
            body {
                 'first_name'
            'last_name'
            'social_number'
            'adress'
            'gender'
            'date_of_birth'
            'salary'
            'rank'
            }

        - Research Assistants
        <http://domain>/employees/research_assistants
        body {
               'first_name'
            'last_name'
            'social_number'
            'adress'
            'gender'
            'date_of_birth'
            'salary'
            'project'
            'is_student'
        }

        - Teaching Assistants
        <http://domain>/employees/teaching_assistants
        body {
            'first_name'
            'last_name'
            'social_number'
            'adress'
            'gender'
            'date_of_birth'
            'salary'
            'project'
            'is_student'
        }

        - Subject
        <http://domain>/subjects
        body {
            'subject_name'
        }

        - Majors
        <http://domain>/majors
        body {
            major_name
        }

    PUT API routes
    <http://domain>/people/{person}
    <http://domain>/students/{student}
    <http://domain>/alumnis/{alumni}
    <http://domain>/employees/professor/{professor}
    <http://domain>/employees/research_assistant/{research_assistant}
    <http://domain>/employees/teaching_assistant/{teaching_assistant}
    <http://domain>/positions/{position}
    <http://domain>/subjects/{subject}
    <http://domain>/majors/{major}

    DELETE API routes
    <http://domain>/people/{person}
    <http://domain>/positions/{position}
    <http://domain>/subjects/{subject}
    <http://domain>/majors/{major}