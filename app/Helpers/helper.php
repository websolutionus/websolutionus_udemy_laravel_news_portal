<?php

/** format news tags */

function formatTags(array $tags): String
{
   return implode(',', $tags);
}
