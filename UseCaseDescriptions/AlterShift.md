| Title | Description |
|-------|:------------|
| Name | Alter Shift|
| Scenario | Modify a shift that has been set |
| Actors | Manager |
| Related Use Cases | Create Shift |
| Stakeholders | Users, Managers |
| Organizational Benefit | If a shifts information has been changed, the system needs to reflect that change to keep information consistent among those interested. |
| Frequency of Use | Moderate/High - ideally the information should not change too much, but with large numbers of shifts and the possibility of changes, usage could grow high. |
| Triggers | The "Alter Shift" link is followed |
| Pre-condition | Manager must be logged in, & the shift to be modified must exist |
| Post-condition | The record in the shifts table in the DB will have been updated |
| Main Course | 1. Manager follows the "Alter shift" 2. The system will display Form to chose from possible shifts. 3. The manager chooses the shift that should be altered 4. System will display the form to Alter the shift 5. Manager Will fill out form appropriately 6. System will updated record in DB and display "Success" message and the details of the modified shift |
| Alternate Courses | 1. Manager inputs invalid data to form. 2. System alerts the managers and allow re-entry of data. |
| Exceptions | 2a. If failure to redirect: display alert message. 4a. If failure to redirect: display alert message 6a. If failure to modify record: display alert message|
