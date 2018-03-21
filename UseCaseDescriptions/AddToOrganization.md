| Title | Description |
|-------|:------------|
| Name | Add to Organization|
| Scenario | Add to an Organization |
| Actors | Manager |
| Related Use Cases | Create User |
| Stakeholders | Users, Managers |
| Organizational Benefit | Organizations need employees by which to carry out their functions, and ways by which to add to them. |
| Frequency of Use | Moderate/High - Organizations will be adding/removing employees at quick rates. |
| Triggers | The "Add to Organization" link is followed |
| Pre-condition | Manager must be logged in & User to be added must exist. |
| Post-condition | A record will be added to the employed table. |
| Main Course | 1. Manager follows the "Add to Organization". 2. The system will display Form to Input new user. 3. The manager enters all relevant information 4. System will insert record in employed table in DB and display "Success" message with the details of the newly created tuple. |
| Alternate Courses | 1. Manager misinputs information, system alerts him or her to error and allows re-entry. |
| Exceptions |2a.  If failure to redirect: display alert message 4a. If failure to modify record: display alert message|
