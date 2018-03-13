| Title | Description |
|-------|:------------|
| Name | Create Organization|
| Scenario | Create an Organization |
| Triggers | The "Create Organization" link is followed |
| Actors | Admin |
| Related use cases| Create Manager |
| Stakeholders | Users, Managers|
| Pre-condition | Admin must be logged in |
| Post-condition | A record will be added to the shifts table |
| Main Course | 1. Admin follows the "Create Organization" 2. The system will display Form to Input organization data. 3. The admin enters all relevant information 4. System will insert record in shifts table in DB and display "Success" message with the details of the newly created organization. 5. System will prompt admin to Create a manager for the organization |
| Alternative Course |2a.  If failure to redirect: display alert message 4a. If failure to modify record: display alert message|

