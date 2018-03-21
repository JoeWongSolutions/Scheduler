| Title | Description |
|-------|:------------|
| Name | Delete User|
| Scenario | A user is deleted from the database system. |
| Actors | Manager |
| Related User Cases | N/A |
| Stakeholders | User, Manager, Admin |
| Organizational Benefit | Managers will be able to empty the list of users when a user is either not needed or has left, keeping the database up to date regarding changes in their workforce |
| Frequency of Use | As the workforce evolves, so must the database. Near constant use assuming large enough number of users. |
| Triggers | A manager selects a user from the database to be removed |
| Preconditions | The manager must be viewing his or her employees and the employee to be removed from the database must exist within the database |
| Post-conditions | The manager has visual confirmation that the user has been deleted from the database. Any searching through the database will show no indication that the user currently exists within the database. |
| Main Course | 1. Manager marks that they wish to remove an employee from their database. 2. System displays the list of employees registered under the manager that the to-be-removed employee is listed under. 3. The manager selects the employee they wish to remove. 4. The system will delete the user entry for that organization. 5. The system will display to the manager that the employee they wished to be deleted has been deleted.|
| Alternative Course | Follow steps 1-3. 4. If the employee belongs to no other organization, the system will remove the user entirely from the database. 5. The system will display to the manager that the employee has been deleted.
| Exceptions | 1. The system identifies a user as already been deleted from the database despite the user still appearing in the database. 2. The admin and the manager attempting the delete are warned by the system.
