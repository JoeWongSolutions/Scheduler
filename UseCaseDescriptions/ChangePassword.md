| Title | Description |
|-------|:------------|
| Name | Change Password|
| Scenario | Modify the user's password |
| Actors | User, Manager, Admin |
| Related use cases| Create User, Create Manager |
| Stakeholders | User, Manager, Admin|
| Organizational Benefit | For the sake of security, all users should be allowed to change their passwords, either in case their password have been compromised or if they feel they aren't secure enough. |
| Frequency of Use | Low - the risk of either of the above cases listed in the organizational benefits should be rare. |
| Triggers | The "Change Password" link is followed |
| Pre-condition | User must exist and be logged in |
| Post-condition | The "password" field in the user's record in the database will have been modified to a new value |
| Main Course | 1. User follows the "change password link" 2. Display Form to add new password. 3. The user enters a new password in 2 input boxes. 4. The system will update the user's record in Database & will display "Success" Message|
| Alternate Course | 3a. The new password as entered by the user does not meet the specifications of the system. The actor is prompted to attempt again. |
| Exceptions | 2a.  If failure to redirect: display alert message 4a. If failure to modify record: display alert message |
