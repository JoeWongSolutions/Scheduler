| Title | Description |
|-------|:------------|
| Name | Delete Manager|
| Scenario | Delete a Manager from the database system. |
| Actors | Admin |
| Related Use Cases | Delete Shift, Alter Shift |
| Stakeholders | User, Manager, Admin |
| Organizational Benefit | Much as an employee of a manager may be changed, so will the managers of organizations as time progresses. This is a natural process of the workforce |
| Frequency of Use | Moderate - As the workforce evolves, so must the database. Not as constant as normal user deletion, but high use assuming large user base. |
| Triggers | The admin selects a user from the database to be removed |
| Preconditions | The admin must be viewing the managers table and the manager to be removed from the database must exist within the database |
| Post-conditions | The admin has visual confirmation that the manager has been deleted from the database. Any searching through the database will show no indication that the manager currently exists within the database. |
| Main Course | 1. Admin marks that they wish to remove a manager from the managers table. 2. System displays the managers table. 3. The admin selects the manager they wish to remove. 4. The system will delete the manager entry within the managers table. 5. The system will display to the admin that the employee they wished to be deleted has been deleted.|
| Alternative Course | |
| Exceptions | 1. The system identifies a manager as already been deleted from the database despite the manager still appearing in the database. 2. The admin is warned by the system.|
