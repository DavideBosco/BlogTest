
export default function getQueryParam(key)
{
    const url = new URL(window.location.href);
    return url.searchParams.get(key) || '';
};