| Title | Description |
|-------|:------------|
| Name | Bid For Shifts |
| Scenario | Users will be assigned points to use toward bidding for a shift. Bidding on a shift will automatically assign the shift to the bidder. |
| Actors | User |
| Related Use Cases | Login |
| Stakeholders | User, Manager |
| Organizational Benefit | The value provided by the bidding system for the organization stems from the savings in overhead for managers to schedule their part-time employees. It also increases employee moral when employees can feel in control of their work schedules. |
| Frequency of Use | High - Bidding will be the primary method for employees to schedule their shifts. It will be in constant use. |
| Triggers | The user selects a shift to bid on |
| Preconditions | The user must be viewing the Bidding UI which displays a calendar of all available shifts |
| Post-conditions | The shift the user selects will be assigned to the user. The user will not be able to select the same shift again.  The user will be able to see the assigned shift in the work schedule UI.  The user may offer the shift for bidding. |
| Main Course | 1. System determines if user is eligible to bid for selected shift.  2. User is prompted to confirm whether the shift is correct and warned about the consequences of confirming.  3. User confirms.  4. System assigns the shift to employee. 5. System redirects back to Bidding UI. |
| Alternate Courses | N/A |
| Exceptions | 1. System determines user is ineligible for shift 2. System notifies the user why the shift was not assigned|
