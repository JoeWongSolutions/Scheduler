| Title | Description |
|-------|:------------|
| Name | Change Password|
| Scenario | Modify the user's password |
| Triggers | The "Change Password" link is followed |
| Actors | All |
| Related use cases| Create User |
| Stakeholders | All actors|
| Pre-condition | User must exist and be logged in |
| Post-condition | The "password" field in the user's record in the database will have been modified to a new value |
| Main Course | 1. User follows the "change password link" 2. Display Form to add new password. 3. The user enters a new password in 2 input boxes. 4. The system will update the user's record in Database & will display "Success" Message|
| Alternative Course |2a.  If failure to redirect: display alert message 4a. If failure to modify record: display alert message|

