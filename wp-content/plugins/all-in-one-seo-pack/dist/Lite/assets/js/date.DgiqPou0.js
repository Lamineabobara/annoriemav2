import{D as n}from"./index.ByF2aI-G.js";import"./translations.Ur07Kmot.js";import{t as a}from"./constants.DfsCWbZk.js";import{_ as o}from"./default-i18n.DvLqo3S3.js";function u(e){return n.fromSQL(e,{zone:"utc"}).setZone(n.local().zoneName).toRelative().replace("a few seconds ago",o("a few seconds ago",a)).replace("a minute ago",o("a minute ago",a)).replace("minutes ago",o("minutes ago",a)).replace("a day ago",o("a day ago",a)).replace("days ago",o("days ago",a)).replace("a month ago",o("a month ago",a)).replace("months ago",o("months ago",a)).replace("a year ago",o("a year ago",a)).replace("years ago",o("years ago",a))}function i(e,t="yyyy-MM-dd HH:mm:ss"){return e?n.fromJSDate(e).setZone(n.local().zoneName).toFormat(t):null}function m(e){return e?n.fromJSDate(new Date(e)).setZone(n.local().zoneName).toJSDate():null}export{m as a,u as b,i as d};
