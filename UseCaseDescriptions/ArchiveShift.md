| Title | Description |
|-------|:------------|
| Name | Archive Shift |
| Scenario | Old shifts will be archived for read only purposes. |
| Actors | System |
| Related Use Cases | Alter Shift, Bid For Shift, Disable Shift |
| Stakeholders | Admin, User, Manager |
| Organizational Benefit | Organizations will be able to see past shift data in order to better plan future shifts which will lead to better productivity and morale. |
| Frequency of Use | Moderate - We expect shifts to be archived after each schedule expires. |
| Triggers | System determines that the current time is greater than the schedule expire time. |
| Preconditions | Schedule must have been created and shifts must have been assigned. |
| Post-conditions | Shifts that belong to the old schedule are moved into an archive table. |
| Main Course | 1. System determines that it is time to start the next schedule. 2. System moves old shifts into archive. |
| Alternate Courses | Admin manually archives shifts. |
| Exceptions | System determines that there is not enough space to move shifts and warns the admin. |
