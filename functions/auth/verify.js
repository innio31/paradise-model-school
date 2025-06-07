const jwt = require('jsonwebtoken');
const { findUser } = require('../helpers/auth-helpers');

exports.handler = async (event) => {
  const token = event.headers.authorization?.split(' ')[1];
  
  if (!token) {
    return { statusCode: 401, body: JSON.stringify({ error: 'No token provided' }) };
  }

  try {
    const decoded = jwt.verify(token, process.env.JWT_SECRET);
    const user = await findUser(decoded.studentId);
    
    if (!user) {
      return { statusCode: 404, body: JSON.stringify({ error: 'User not found' }) };
    }

    return {
      statusCode: 200,
      body: JSON.stringify({ 
        user: {
          name: user.name,
          grade: user.grade,
          section: user.section
        }
      })
    };
  } catch (err) {
    return { statusCode: 401, body: JSON.stringify({ error: 'Invalid token' }) };
  }
};