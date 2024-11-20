
# Comprehensive Guide to JavaScript String Methods

JavaScript provides a variety of string methods to manipulate and work with strings. This document explains each method in detail with examples.

---

## 1. `charAt(index)`
- **Description:** Returns the character at the specified index.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.charAt(1)); // Output: "e"
  ```

---

## 2. `charCodeAt(index)`
- **Description:** Returns the Unicode value (ASCII code) of the character at the specified index.
- **Example:**
  ```javascript
  const str = "ABC";
  console.log(str.charCodeAt(0)); // Output: 65
  ```

---

## 3. `concat(...strings)`
- **Description:** Joins two or more strings and returns the result.
- **Example:**
  ```javascript
  const str1 = "Hello";
  const str2 = "World";
  console.log(str1.concat(" ", str2)); // Output: "Hello World"
  ```

---

## 4. `includes(substring, start)`
- **Description:** Checks if the string contains the specified substring. Returns `true` or `false`.
- **Example:**
  ```javascript
  const str = "JavaScript";
  console.log(str.includes("Script")); // Output: true
  ```

---

## 5. `endsWith(substring, length)`
- **Description:** Checks if the string ends with the specified substring. Returns `true` or `false`.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.endsWith("lo")); // Output: true
  ```

---

## 6. `indexOf(substring, start)`
- **Description:** Returns the first index of the substring, or `-1` if not found.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.indexOf("l")); // Output: 2
  ```

---

## 7. `lastIndexOf(substring, start)`
- **Description:** Returns the last index of the substring, or `-1` if not found.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.lastIndexOf("l")); // Output: 3
  ```

---

## 8. `match(regex)`
- **Description:** Matches a string against a regular expression and returns the matches.
- **Example:**
  ```javascript
  const str = "Hello 123";
  console.log(str.match(/\d+/)); // Output: ["123"]
  ```

---

## 9. `matchAll(regex)`
- **Description:** Returns all matches of a regular expression, including capturing groups, as an iterator.
- **Example:**
  ```javascript
  const matches = "test1 test2".matchAll(/test(\d)/g);
  console.log([...matches]); // Output: [["test1", "1"], ["test2", "2"]]
  ```

---

## 10. `padStart(targetLength, padString)`
- **Description:** Pads the start of the string to a given length with a specified string.
- **Example:**
  ```javascript
  const str = "5";
  console.log(str.padStart(3, "0")); // Output: "005"
  ```

---

## 11. `padEnd(targetLength, padString)`
- **Description:** Pads the end of the string to a given length with a specified string.
- **Example:**
  ```javascript
  const str = "5";
  console.log(str.padEnd(3, "0")); // Output: "500"
  ```

---

## 12. `repeat(count)`
- **Description:** Repeats the string the specified number of times.
- **Example:**
  ```javascript
  const str = "Hi";
  console.log(str.repeat(3)); // Output: "HiHiHi"
  ```

---

## 13. `replace(searchValue, replaceValue)`
- **Description:** Replaces the first occurrence of a substring or a regular expression match.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.replace("l", "x")); // Output: "Hexlo"
  ```

---

## 14. `replaceAll(searchValue, replaceValue)`
- **Description:** Replaces all occurrences of a substring or regex match.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.replaceAll("l", "x")); // Output: "Hexxo"
  ```

---

## 15. `slice(start, end)`
- **Description:** Extracts a section of the string and returns it as a new string.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.slice(1, 4)); // Output: "ell"
  ```

---

## 16. `split(separator, limit)`
- **Description:** Splits a string into an array of substrings based on the specified separator.
- **Example:**
  ```javascript
  const str = "a,b,c";
  console.log(str.split(",")); // Output: ["a", "b", "c"]
  ```

---

## 17. `startsWith(substring, start)`
- **Description:** Checks if the string starts with the specified substring. Returns `true` or `false`.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.startsWith("He")); // Output: true
  ```

---

## 18. `substring(start, end)`
- **Description:** Extracts characters between two indices.
- **Example:**
  ```javascript
  const str = "Hello";
  console.log(str.substring(1, 4)); // Output: "ell"
  ```

---

## 19. `toLowerCase()`
- **Description:** Converts the string to lowercase.
- **Example:**
  ```javascript
  const str = "HELLO";
  console.log(str.toLowerCase()); // Output: "hello"
  ```

---

## 20. `toUpperCase()`
- **Description:** Converts the string to uppercase.
- **Example:**
  ```javascript
  const str = "hello";
  console.log(str.toUpperCase()); // Output: "HELLO"
  ```

---

## 21. `trim()`
- **Description:** Removes whitespace from both ends of the string.
- **Example:**
  ```javascript
  const str = "  Hello  ";
  console.log(str.trim()); // Output: "Hello"
  ```

---

## 22. `trimStart()` / `trimEnd()`
- **Description:** Removes whitespace from the start (`trimStart`) or end (`trimEnd`) of the string.
- **Examples:**
  ```javascript
  const str = "  Hello";
  console.log(str.trimStart()); // Output: "Hello"

  const str2 = "Hello  ";
  console.log(str2.trimEnd());   // Output: "Hello"
  ```

---

## 23. `valueOf()`
- **Description:** Returns the primitive value of a String object.
- **Example:**
  ```javascript
  const str = new String("Hello");
  console.log(str.valueOf()); // Output: "Hello"
  ```

---

## 24. `toString()`
- **Description:** Returns a string representation of the object.
- **Example:**
  ```javascript
  const num = 123;
  console.log(num.toString()); // Output: "123"
  ```

---

## 25. `localeCompare(compareString)`
- **Description:** Compares two strings in the current locale and returns:
  - `-1` if the string is less than `compareString`.
  - `0` if the strings are equal.
  - `1` if the string is greater than `compareString`.
- **Example:**
  ```javascript
  console.log("apple".localeCompare("banana")); // Output: -1
  ```

---

## 26. `search(regex)`
- **Description:** Searches for a match between the string and a regular expression. Returns the index of the first match or `-1`.
- **Example:**
  ```javascript
  const str = "Hello World";
  console.log(str.search(/World/)); // Output: 6
  ```

---

## 27. `fromCharCode(...codes)` (Static Method)
- **Description:** Converts Unicode values to characters.
- **Example:**
  ```javascript
  console.log(String.fromCharCode(65, 66, 67)); // Output: "ABC"
  ```

---

