| Title | Description |
|-------|:------------|
| Name | Login |
| Scenario | The actor logs into the scheduler site for access to the shifts and schedules, or to perform administration duties (Admin only) |
| Actors | User, Manager, Admin |
| Related Use Cases | Logout |
| Stakeholders | Admin, User, Manager |
| Organizational Benefit | Without the ability to access the site in their respective roles, the actors are not able to perform their responsibilities in timely fashion, workflow slows. |
| Frequency of Use | High - Will almost always be a daily action for each actor, people are always working somewhere. |
| Triggers | Actor selects that they wish to log in using their credentials to the site. |
| Preconditions | A valid field for login must be presented to the actor. |
| Post-conditions | Actor is free to perform their duties within the site after having successfully logged in. |
| Main Course | 1. Actors accesses the site and is presented with the option of logging in. 2. Actor will select they wish to log in and will then submit their credentials to be checked by the database. 3. Upon successful match with their record, actor is allowed further into the site to perform their duties. |
| Alternate Courses | 1. User makes a mistake in their credentials and are brought back to the login page alerting them to their error. |
| Exceptions | Database fails to find credentials of actor despite user existing within database system.|
