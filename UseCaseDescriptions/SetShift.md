| Title | Description |
|-------|:------------|
| Name | Set Shift |
| Scenario | Managers will be able to create shifts for employees to bid on. |
| Actors | Managers |
| Related Use Cases | View Schedule, Alter Shift |
| Stakeholders | Admin, User, Manager |
| Organizational Benefit | Managers will be able to control the specifications of each shift so that they can balance employee moral which will make the working environment more pleasant for everyone. |
| Frequency of Use | Moderate/High - Shifts must be created either manually or copied from an existing shift’s template so this should be used at least every schedule. |
| Triggers | 1. The user selects a blank time box. 2. The user selects an existing shift |
| Preconditions | The user must be viewing the Schedule UI which displays a calendar of all available shifts |
| Post-conditions | The shift will be available for bidding until all available slots are full and the shift will be editable and delete-able upon creation |
| Main Course | 1. System determines if a shift is to be added or edited. 2. System displays details of the shift to user. 3. User inputs all necessary information into the shift form. 4. User saves inputs. 5. System updates the UI with new shift information |
| Alternate Courses | 1. User clicks and drags an existing shift box. 2. System updates the shift with the new times. 3. System updates the UI with new shift information |
| Exceptions | 1. System determines that a shift is duplicate, System prompts user that shift already exists. 2. System determines that necessary fields have not been filled and does not have enough information to create the shift, System prompts the user to fill in necessary fields |
