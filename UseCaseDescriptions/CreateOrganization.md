| Title | Description |
|-------|:------------|
| Name | Create Organization|
| Scenario | Create an Organization |
| Actors | Admin |
| Related Use Cases | Create Manager |
| Stakeholders | Users, Managers |
| Organizational Benefit | If organizations are not created within the database, then no one in the organization can use the site. |
| Frequency of Use | Low/Moderate - Organizations are large entities holding many employees, but still register as a single organization. | 
| Triggers | The "Create Organization" link is followed. |
| Pre-condition | Admin must be logged in. |
| Post-condition | A record will be added to the shifts table. |
| Main Course | 1. Admin follows the "Create Organization" 2. The system will display Form to Input organization data. 3. The admin enters all relevant information 4. System will insert record in shifts table in DB and display "Success" message with the details of the newly created organization. 5. System will prompt admin to Create a manager for the organization |
| Alternate Courses | 1. Admin inputs invalid information within the form fields. 2. The system alerts him or her to the mistake and allows re-entry. |
| Exceptions |2a.  If failure to redirect: display alert message 4a. If failure to modify record: display alert message|
