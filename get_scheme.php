<?php


function get_scheme($tag) {
    preg_match_all('/sc-([a-zA-Z\-]+)/', $tag, $matches);
    return $matches[1];
}

function parse_tree($node) {
    $result = [];

    if ($node instanceof DOMElement) {
        $schemes = get_scheme($node->nodeName);
        $attributes = [];
        foreach ($node->attributes as $attribute) {
            $attrName = str_replace('sc-','',$attribute->nodeName);
            $attrValue = $attribute->nodeValue;
            $attributes[$attrName] = $attrValue;
        }

        if (!empty($schemes) || !empty($attributes)) {
            $schemeAttributes = array_merge($schemes, $attributes);
            $result[] = $schemeAttributes;
        }

        foreach ($node->childNodes as $child) {
            $childResult = parse_tree($child);
            if (!empty($childResult)) {
                $result[] = $childResult;
            }
        }
    }

    return $result;
}

$input = '<div sc-prop sc-alias="" sc-type="Organization"><div sc-name="Alice">Hello <i sc-name="Wonderland">World</i></div></div>';
$dom = new DOMDocument();
$dom->loadHTML($input, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$output = parse_tree($dom->documentElement);

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
