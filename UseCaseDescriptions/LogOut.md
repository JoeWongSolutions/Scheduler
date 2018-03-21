| Title | Description |
|-------|:------------|
| Name | Logout |
| Scenario | The actor logs out of the scheduler site |
| Actors | User, Manager, Admin |
| Related Use Cases | Login |
| Stakeholders | Admin, User, Manager |
| Organizational Benefit | Logging out is the necessary counter action to logging in, and keeps actors from leaving their access open. |
| Frequency of Use | High - Will almost always be a daily action for each actor. |
| Triggers | Actor selects that they wish to log out of the site. |
| Preconditions | Actor is currently in the schedule view and has a valid link for logging out. |
| Post-conditions | Actor is logged out of the system and is presented with the log in page again. |
| Main Course | 1. Actor selects the logging out link provided in the schedule view. 2. The page will prompt them to confirm they wish to leave the site. 3. Upon selecting yes, the actor is logged out of the system and the login page is presented for the user. |
| Alternate Courses | 1. Actor is logged out of a period of inactivity. |
| Exceptions | 1. Database fails to log out the actor, admin is alerted. |
