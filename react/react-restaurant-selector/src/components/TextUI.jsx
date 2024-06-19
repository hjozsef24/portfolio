import React from "react";

export default function TextUI ({ text, type }) {
  return React.createElement(type, null, text)
}
