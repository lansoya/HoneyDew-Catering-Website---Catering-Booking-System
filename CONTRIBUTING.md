# Contributing to HoneyDew Catering Booking System

Thank you for your interest in contributing to the HoneyDew Catering Booking System! This document provides guidelines for contributing to this project.

## Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [How to Contribute](#how-to-contribute)
- [Development Guidelines](#development-guidelines)
- [Pull Request Process](#pull-request-process)
- [Issue Reporting](#issue-reporting)

## Code of Conduct

This project adheres to a Code of Conduct that all contributors are expected to follow. Please read and understand it before contributing.

### Our Standards

- Be respectful and inclusive
- Provide constructive feedback
- Focus on what is best for the community
- Show empathy towards other contributors

## Getting Started

1. Fork the repository on GitHub
2. Clone your fork locally
3. Set up the development environment following the README instructions
4. Create a new branch for your feature or bug fix

## How to Contribute

### Types of Contributions

- **Bug Reports**: Help us identify and fix issues
- **Feature Requests**: Suggest new functionality
- **Code Contributions**: Submit bug fixes or new features
- **Documentation**: Improve or add documentation
- **Testing**: Add test cases or improve existing tests

### Before You Start

- Check existing issues to avoid duplicates
- Discuss major changes by opening an issue first
- Ensure your changes align with the project's goals

## Development Guidelines

### Code Style

- Follow PSR-1 and PSR-12 PHP coding standards
- Use meaningful variable and function names
- Add comments for complex logic
- Maintain consistency with existing code

### Database Changes

- Include migration scripts for database changes
- Test database operations thoroughly
- Ensure backward compatibility when possible

### Security

- Always validate and sanitize user input
- Use prepared statements for database queries
- Follow secure coding practices
- Report security vulnerabilities privately

### Testing

- Test your changes thoroughly
- Include both positive and negative test cases
- Test on different PHP versions if possible
- Verify database operations work correctly

## Pull Request Process

1. **Create a Feature Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. **Make Your Changes**
   - Follow the development guidelines
   - Test your changes
   - Update documentation if needed

3. **Commit Your Changes**
   ```bash
   git add .
   git commit -m "Add descriptive commit message"
   ```

4. **Push to Your Fork**
   ```bash
   git push origin feature/your-feature-name
   ```

5. **Submit a Pull Request**
   - Use a clear and descriptive title
   - Provide a detailed description of changes
   - Reference any related issues
   - Include screenshots for UI changes

### Pull Request Checklist

- [ ] Code follows the project's style guidelines
- [ ] Self-review of the code has been performed
- [ ] Code has been tested thoroughly
- [ ] Documentation has been updated if necessary
- [ ] No new warnings or errors are introduced
- [ ] Related issues are referenced in the PR description

## Issue Reporting

### Bug Reports

When reporting bugs, please include:

- Clear and descriptive title
- Steps to reproduce the issue
- Expected vs. actual behavior
- Environment details (PHP version, OS, etc.)
- Screenshots or error messages if applicable

### Feature Requests

When suggesting features:

- Explain the problem the feature would solve
- Describe the proposed solution
- Consider alternative solutions
- Explain why this feature would benefit the project

### Issue Labels

- `bug` - Something isn't working
- `enhancement` - New feature or request
- `documentation` - Improvements to documentation
- `good first issue` - Good for newcomers
- `help wanted` - Extra attention is needed

## Development Setup

### Local Environment

1. Install required software (PHP, MySQL, web server)
2. Clone and configure the project
3. Set up the database
4. Configure environment variables

### Recommended Tools

- **IDE**: Visual Studio Code, PhpStorm, or similar
- **Database**: phpMyAdmin or MySQL Workbench
- **Version Control**: Git
- **Testing**: Browser developer tools

## Recognition

Contributors will be acknowledged in:
- The project's README file
- Release notes for significant contributions
- Special recognition for outstanding contributions

## Questions?

If you have questions about contributing:

- Check existing issues and discussions
- Open a new issue with the `question` label
- Contact the maintainers directly

Thank you for contributing to the HoneyDew Catering Booking System!