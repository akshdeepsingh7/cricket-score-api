# Cricket Score API 🏏

[![PHP Version](https://img.shields.io/badge/PHP-7.0%2B-blue.svg)](https://www.php.net)
[![Status](https://img.shields.io/badge/Status-Active-success.svg)]()

A simple PHP-based API that fetches live cricket scores from Cricbuzz URLs. 🎯

## ✨ Features

- 🌐 Web interface for easy score retrieval
- 🔌 JSON API endpoint
- ✅ URL validation
- ⚠️ Error handling
- 🔄 Live score extraction from Cricbuzz pages

## 📋 Requirements

- 🔧 PHP 7.0 or higher
- 📦 DOM and libxml PHP extensions

## 🚀 Usage

### 💻 Web Interface

1. Access the root URL without parameters to view the web interface
2. Enter a valid Cricbuzz URL in the input field
3. Click "Get Score" to fetch the live score

### 🔗 API Endpoint

Make a GET request with the `url` parameter:

```
GET /?url=https://www.cricbuzz.com/live-cricket-scores/[match-id]
```

### 📝 Response Format

Success Response:
```json
{
    "status": "success",
    "message": "Current Score",
    "data": "Team A 100/2 (15.2 Ov)"
}
```

Error Response:
```json
{
    "status": "error",
    "message": "Error description"
}
```

## ⚠️ Error Messages

- "Invalid URL format" - The provided URL is not properly formatted
- "Failed to retrieve data from the source" - Unable to fetch data from Cricbuzz
- "Score card not found" - Unable to locate score information on the page

## 🔒 Security Features

- 🛡️ URL validation using `filter_var()`
- 📨 JSON content-type headers
- 🧹 Input sanitization

## ⚡ Limitations

- 🔄 Depends on Cricbuzz's HTML structure
- ⚠️ May break if Cricbuzz changes their page layout
- 💾 No caching mechanism implemented

## 📞 Support

[![Issues](https://img.shields.io/badge/Issues-Welcome-brightgreen.svg)](https://github.com/akshdeepsingh7/cricket-score-api/issues)
