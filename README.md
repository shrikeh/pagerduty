PagerManager
============

##Application Flow

* Call to User API end point and get the User ID for user X
```bash
curl "https://${PAGERDUTY_DOMAIN}/api/v1/users" \
  -H "Content-type: application/json" \
  -H "Authorization: Token token=${PAGERDUTY_API_TOKEN}" \
  -X GET \
  -G \
  --data-urlencode "query=${PAGERDUTY_USER_EMAIL}"
```

* Call to Escalation Policy API end point and get the schedules within the designated Escalation Policy (can be asynchronous with above):
```bash
curl "https://${PAGERDUTY_DOMAIN}/api/v1/escalation_policies/${PAGERDUTY_ESCALATION_POLICY_ID}" \
  -H "Content-type: application/json" \
  -H "Authorization: Token token=${PAGERDUTY_API_TOKEN}" \
  -X GET
```
* For each schedule in the escalation policy, query the entries for the given date range:
```bash
curl "https://${PAGERDUTY_DOMAIN}/api/v1/schedules/${PAGERDUTY_SCHEDULE_ID}/entries" \
  -H "Content-type: application/json" \
  -H "Authorization: Token token=${PAGERDUTY_API_TOKEN}" \
  -X GET \
  -G \
  --data-urlencode "since=${PAGERDUTY_SINCE_DATETIME}" \
  --data-urlencode "until=${PAGERDUTY_UNTIL_DATETIME}" \
  --data-urlencode "overflow=true" \
  --data-urlencode "user_id=${PAGERDUTY_USER_ID}"
```
Note: possible optimization is to remove the `user_id` filter in the API call, and so make the entire call cacheable, and then filter for the given user ID in the response.


```
