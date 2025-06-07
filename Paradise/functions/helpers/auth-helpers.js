const bcrypt = require('bcryptjs');
const users = require('./users.json');

async function findUser(studentId) {
  return users.find(user => user.studentId === studentId);
}

async function validateUser(studentId, password) {
  const user = await findUser(studentId);
  if (!user) return null;
  
  const isValid = await bcrypt.compare(password, user.password);
  return isValid ? user : null;
}

module.exports = { findUser, validateUser };