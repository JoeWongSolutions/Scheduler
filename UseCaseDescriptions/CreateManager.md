| Title | Description |
|-------|:------------|
| Name | Create Manager |
| Scenario | User is added to Managers table system database |
| Actors | Admin |
| Related Use Cases | Delete Manager |
| Stakeholders | Admin, User, Manager |
| Organizational Benefit | Organizations need Managers by which to lead teams of employees and help facilitate efficient workflow. |
| Frequency of Use | Moderate - We expect Managers to be appointed, but not at the same rate as employees. |
| Triggers | Admin selects from the Users the one to be transferred to the Managers table. |
| Preconditions | User does have record in database but not in Managers table. |
| Post-conditions | User has record in database and in Manager table. |
| Main Course | 1. Admin selects User from Users table and selects request to move to Managers. 2. Form for Manager Transfer created. 3. Form is filled out and submitted by the Admin. 5. Record made, database updated. |
| Alternate Courses | N/A |
| Exceptions | 1a. Connection fails activation untriggered fail to Form not received 2a. Form not received in time, alert Admin, fail gracefully. 4a. Connection failed on form submit, alert Admin. 5a. Database does not accept change, alert Admin |
