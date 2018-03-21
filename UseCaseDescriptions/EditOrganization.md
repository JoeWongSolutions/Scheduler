| Title | Description |
|-------|:------------|
| Name | Edit Organization |
| Scenario | Admin will be able to edit details about the organization. |
| Actors | Admin |
| Related Use Cases | Add to Organization |
| Stakeholders | Admin, User, Manager |
| Organizational Benefit | Organizations will be able to use the scheduler software after contacting and registering with an Admin. |
| Frequency of Use | Low - We don’t expect to edit details about an organization often. |
| Triggers | The user selects an existing organization. |
| Preconditions | The user must be viewing a list of existing organizations. |
| Post-conditions | The new details of the organization will overwrite the existing ones. |
| Main Course | 1. System queries and displays a list of existing organizations with similar names. 2. Admin selects existing organization. 3. System displays organization details in a form. 4. Admin selects and edits form details. 5. System prompts admin to confirm changes to the organization. 6. System overwrites existing data with new changes. |
| Alternate Courses | 1. Admin inputs invalid data into fields. 2. System alerts admin, allows re-entry of data. |
| Exceptions | 1. System determines that necessary fields have been left blank and prompts the user to fill in those fields. 2. System determines that the changes will cause a conflict in the database and warns the user before discarding changes. |
