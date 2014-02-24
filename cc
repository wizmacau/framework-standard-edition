app/console cache:clear --env=dev --no-optional-warmers
app/console cache:clear --env=prod --no-optional-warmers
app/console redis:flushdb --client=doctrine --env=prod