| Title | Description |
|-------|:------------|
| Name | Add to Organization|
| Scenario |Add to an Organization |
| Triggers | The "Add to Organization" link is followed |
| Actors | Manager |
| Related use cases|  Create User |
| Stakeholders | Users, Managers|
| Pre-condition | Manager must be logged in & User to be added must exist|
| Post-condition | A record will be added to the employed table |
| Main Course | 1. Manager follows the "Add to Organization" 2. The system will display Form to Input new user. 3. The manager enters all relevant information 4. System will insert record in employed table in DB and display "Success" message with the details of the newly created tuple. |
| Alternative Course |2a.  If failure to redirect: display alert message 4a. If failure to modify record: display alert message|

