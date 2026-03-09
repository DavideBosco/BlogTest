import getQueryParam from "./get-query-param.js";
import { pageUrlParam } from "./../consts.js";

export default function getPageParam() {
    const page = getQueryParam(pageUrlParam);
    return page != "" && Number.isFinite(+page) ? Math.max(page, 0) : 1;
}